<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PasswordUpdateType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('oldPassword', PasswordType::class,
                $this->getConfiguration("Older password", "Enter your current password..."))
            ->add('newPassword', PasswordType::class,
                $this->getConfiguration("New password", "Enter your new password..."))
            ->add('confirmPassword', PasswordType::class,
                $this->getConfiguration("Confirmation of password", "Confirm your new password..."))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
