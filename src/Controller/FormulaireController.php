<?php

namespace App\Controller;

use App\Entity\Formulaire;
use App\Form\FormulaireType;
use App\Services\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/contact')]
class FormulaireController extends AbstractController
{
    #[Route('/', name: 'app_formulaire')]
    public function index(Request $request, MailerService $mailerService): Response
    {   
        $form = new Formulaire();
        $form = $this->createForm(FormulaireType::class, $form);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid() )
        {
            $contactData = $form->getData();
            $mailerService->sendEmail($contactData->getSujet(),$contactData->getMessage(),$contactData->getEmail());
            $this->addFlash('success', 'Vore message a été envoyé');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
            'form' => $form->createView()
        ]);
    }
}
