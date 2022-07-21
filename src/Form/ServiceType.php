<?php

namespace App\Form;

use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('service',TextType::class,[
                'label'=>'service',
                'attr'=>['placeholder'=>'service',
                        'class'=>'form-control',
                ]
            ])
            ->add('description',TextareaType::class,[
                'label'=>'description',
                'attr'=>['placeholder'=>'description',
                        'rows' => '10',
                        'cols' => '50',
                        'class'=>'form-control']
            ])
            ->add('url',TextType::class,[
                'label'=>'url',
                'attr'=>['placeholder'=>'url',
                        'class'=>'form-control',
                ]])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
