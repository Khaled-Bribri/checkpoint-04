<?php

namespace App\Controller;

use App\Entity\Formulaire;
use App\Form\FormulaireType;
use App\Service\MailerService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contact')]
class FormulaireController extends AbstractController
{
    #[Route('/', name: 'app_formulaire')]
    public function index(Request $request, MailerService $mailerService): Response
    {
        $formulaire = new Formulaire();
        $form = $this->createForm(FormulaireType::class, $formulaire);
        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) {
            $contactData = $form->getData();
            try {
                $mailerService->sendEmail($contactData->getEmail(), $contactData->getSujet(), $contactData->getMessage());
                $this->addFlash('success', 'Vore message a été envoyé');
                return $this->redirectToRoute('app_home');
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
            'form' => $form->createView()
        ]);
    }
}
