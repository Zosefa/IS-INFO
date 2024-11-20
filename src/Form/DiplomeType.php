<?php

namespace App\Form;

use App\Entity\Diplome;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiplomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomDiplome',TextType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Entrer le Diplome',
                    'class' => 'form-control m-quto',
                    'style' => 'height:50px;margin:0px'
                ]
            ])
            ->add('categorie',TextType::class,[ 
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Categorie du Diplome',
                    'class' => 'form-control m-auto',
                    'style' => 'height:50px;margin:0px'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Diplome::class,
        ]);
    }
}
