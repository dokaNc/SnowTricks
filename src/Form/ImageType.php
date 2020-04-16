<?php

namespace App\Form;

use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', FileType::class, [
                'attr' => [
                    'class' => 'btn btn-light btn-shadow m-b-15',
                    'style' => 'display: inline;'
                ],
            ])
            ->add('mainImage', CheckboxType::class, [
            'required' => false,
            'label' => 'Main Image'
            ])
            ->add('active', CheckboxType::class, [
                'required' => false,
                'attr' => [
                    'checked' => 1
                ],
            ])
            ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
        ]);
    }
}
