<?php

namespace App\Form;

use App\Entity\Filiere;
use App\Entity\Niveaux;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiliereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomFiliere',TextType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Nom de la filiere',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('description',TextareaType::class,[ 
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'description de la filiere',
                    'class' => 'form-control',
                    'style' => 'height:250px'
                ]
            ])
            ->add('FileImage',FileType::class,[
                'requried' => false,
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Nom de la filiere',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('IdNiveaux',EntityType::class,[
                'label' => ' ',
                'class' => Niveaux::class,
                'choice_label' => 'niveaux',
                'attr' => [
                    'placeholder' => 'Niveau d\'etude',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Filiere::class,
        ]);
    }
}
