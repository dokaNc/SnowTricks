<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => false, 'attr' => ['placeholder' => 'Username', 'class' => 'input-field']])
            ->add('email', TextType::class, [
                'label' => false, 'attr' => ['placeholder' => 'Email', 'class' => 'input-field'], 'constraints' => [
                    new NotBlank([
                    'message' => 'Please enter a email address',]),],
                ])
            ->add('plainPassword', PasswordType::class, ['label' => false, 'attr' => ['placeholder' => 'Password', 'class' => 'input-field'],
                'mapped' => false,
                'constraints' => [new NotBlank(['message' => 'Please enter a password',]),
                    new Length(['min' => 6, 'minMessage' => 'Your password should be at least {{ limit }} characters', 'max' => 4096,]),],
                ])
            ->add('sendMail', SubmitType::class, [
                'attr' => ['class' => 'btn btn-default'], 'label' => 'Register']);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
