<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
#[Route('/service')]
class ServiceController extends AbstractController
{
    #[Route('/', name: 'app_service')]
    public function index(ServiceRepository $serviceRepository): Response
    {
        $services = $serviceRepository->findAll();
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
            'services'=>$services
        ]);
    }
    #[IsGranted('ROLE_ADMIN', message: 'No access! Get out!')]
    #[Route('/new',name:'app_service_new',methods: ['GET', 'POST'])]
    public function new(ServiceRepository $serviceRepository, Request $request ){

        $service = new Service();
        $form=$this->createForm(ServiceType::class,$service);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $serviceRepository->add($service,true);

            return $this->redirectToRoute('app_service',[],Response::HTTP_SEE_OTHER);
        }

        return $this->render('service/new.html.twig',['form'=>$form->createView()]);
    }
    #[IsGranted('ROLE_ADMIN', message: 'No access! Get out!')]
    #[Route('/{id}/show', name: 'app_service_show',methods:['Get'])]
    public function show(Service $service):Response
    {
        return $this->render('service/show.html.twig',['service'=>$service]);
    }

    #[IsGranted('ROLE_ADMIN', message: 'No access! Get out!')]
    #[Route('/{id}/edit', name: 'app_service_edit',methods: ['GET', 'POST'])]
    public function edit(Service $service, ServiceRepository $serviceRepository, Request $request):Response
    {
    
        $form = $this->createForm(ServiceType::class,$service);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $serviceRepository->add($service,true);
            return $this->redirectToRoute('app_service',[],Response::HTTP_SEE_OTHER);

        }
        return $this->render('service/edit.html.twig',['form'=>$form->createView()]);
    }
    #[IsGranted('ROLE_ADMIN', message: 'No access! Get out!')]
    #[Route('/{id}', name: 'app_service_delete', methods: ['POST'])]
    public function delete(Service $service, ServiceRepository $serviceRepository, Request $request): Response {

        if ($this->isCsrfTokenValid('delete' . $service->getId(), $request->request->get('_token'))) {
            $serviceRepository->remove($service, true);
        }

        return $this->redirectToRoute('app_service_index', [], Response::HTTP_SEE_OTHER);
    }
    

}



