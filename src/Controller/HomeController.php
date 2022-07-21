<?php

namespace App\Controller;
use App\Entity\Presentation;
use App\Form\PresentationType;
use App\Repository\PresentationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
#[Route('/home')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PresentationRepository $presentationRepository): Response
    {
        $presentations = $presentationRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'presentations'=>$presentations
        ]);
    }
    #[IsGranted('ROLE_ADMIN', message: 'No access! Get out!')]
    #[Route('/{id}/edit', name: 'app_home_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Presentation $presentation,PresentationRepository $presentationRepository):Response
    {
        $form = $this->createForm(PresentationType::class,$presentation);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $presentationRepository->add($presentation,true);
            return $this->redirectToRoute('app_home',[], Response::HTTP_SEE_OTHER);
        }
    return $this->render('home/edit.html.twig',['form'=>$form->createView()]);  
    }
}
