<?php

namespace App\Form;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Entity\Formulaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class FormulaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class, [
                'label' => 'Nom Prenom',
                'attr' => ["class" => 'form-control']
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => ["class" => 'form-control']
            ])
            ->add('sujet', TextType::class, [
                'label' => 'sujet',
                'attr' => ["class" => 'form-control']
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'attr' => [
                    "rows" => 5,
                    "placeholder" => "Ecrivez votre message",
                    "class" => 'form-control'
                ]
            ])
            ->add('Envoyer', SubmitType::class, [
                'attr' => ["class" => 'btn btn-primary']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formulaire::class,
        ]);
    }
}
