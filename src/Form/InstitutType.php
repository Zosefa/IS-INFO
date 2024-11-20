<?php

namespace App\Form;

use App\Entity\Institut;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstitutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomInstitut',TextType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Nom de l\' Institut',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('description',TextareaType::class,[ 
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'description de l\' Institut',
                    'class' => 'form-control',
                    'style' => 'height:250px'
                ]
            ])
            ->add('FileImage',FileType::class,[
                'required' => false ,
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Image',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('agrement',TextareaType::class,[ 
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Agrement de l\' Institut',
                    'class' => 'form-control',
                    'style' => 'height:250px'
                ]
            ])
            ->add('siege',TextType::class,[ 
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Siege de l\' Institut',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('email',TextType::class,[ 
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Email de l\' Institut',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('email2',TextType::class,[ 
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Deuxieme email de l\' Institut',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('Tel1',TextType::class,[ 
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Numero de l\' Institut',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
            ->add('Tel2',TextType::class,[ 
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Deuxieme Numero de l\' Institut',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Institut::class,
        ]);
    }
}
