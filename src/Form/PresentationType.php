<?php

namespace App\Form;

use App\Entity\Presentation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PresentationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',TextType::class,[
                'label'=>'Titre',
                'attr'=>['placeholder'=>'Titre',
                        'class'=>'form-control',
                ]
            ])
            ->add('presentation',TextareaType::class,[
                'label'=>'Presentation',
                'attr'=>['placeholder'=>'Presentation',
                        'rows' => '10',
                        'cols' => '50',
                        'class'=>'form-control']
            ])
            ->add('url',TextType::class,[
            'label'=>'Titre',
            'attr'=>['placeholder'=>'Titre',
                    'class'=>'form-control',
            ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Presentation::class,
        ]);
    }
}
