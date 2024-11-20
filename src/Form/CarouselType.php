<?php

namespace App\Form;

use App\Entity\Carousel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarouselType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Mot',TextareaType::class,[
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Phrase',
                    'class' => 'form-control',
                    'style' => 'height:100px'
                ]
            ])
            ->add('FileImage',FileType::class,[
                'required' => false,
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Image',
                    'class' => 'form-control',
                    'style' => 'height:50px'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Carousel::class,
        ]);
    }
}
