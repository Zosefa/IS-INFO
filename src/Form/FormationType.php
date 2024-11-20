<?php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomFormation',TextType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Nom de la Formation',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('description',TextareaType::class,[ 
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'description de la Formation',
                    'class' => 'form-control',
                    'style' => 'height:250px'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}