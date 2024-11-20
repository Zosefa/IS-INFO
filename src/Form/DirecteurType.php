<?php

namespace App\Form;

use App\Entity\Directeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DirecteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Nom du Directeur', 
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('prenom',TextType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Prenom du Directeur',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('motdirecteur',TextareaType::class,[ 
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Mot du derecteur',
                    'class' => 'form-control',
                    'style' => 'height:250px'
                ]
            ])
            ->add('FileImage',FileType::class,[
                'required' => false,
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Nom de la Directeur',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Directeur::class,
        ]);
    }
}
