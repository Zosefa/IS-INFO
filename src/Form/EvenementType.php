<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomEvenement',TextType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Nom de l\' Evenement',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('DateEvenement',DateType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Date de l\' Evenement',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('LieuEvenement',TextType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Lieu de l\' Evenement',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('description',TextareaType::class,[ 
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'description de l\' Evenement',
                    'class' => 'form-control',
                    'style' => 'height:250px'
                ]
            ])
            ->add('FileImage',FileType::class,[
                'required' => false,
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Image de l\' Evenement',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
