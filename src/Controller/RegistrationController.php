<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param \Swift_Mailer $mailer
     * @return Response
     */
    public function register(Request $request, \Swift_Mailer $mailer,UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            // generate uuid for validation token
            $regToken = uuid_create((UUID_TYPE_RANDOM));
            $user->setRegToken($regToken);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            $message = (new \Swift_Message('Account confirmation'))
                ->setFrom(['cirpan.dogukan5959@gmail.com' => 'SnowTricks'])
                ->setTo($user->getEmail())
                ->setSubject('Register confirmation link')
                ->setBody($this->renderView('email/register.html.twig', ['token' => $regToken]), 'text/html');
            $mailer->send($message);
            $this->addFlash('warning', 'Check your email and click on the confirmation link, thank you.');

            return $this->redirectToRoute('app_home');

        }


        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'current_menu' => 'register'

        ]);
    }

    /**
     * @Route("/register/{reg_token}", name="app_register_validation")
     * @param Request $request
     * @return Response
     */
    public function registerValidation(Request $request, $reg_token): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->findOneBy(
            [
                'reg_token' => $reg_token
            ]
        );

        $error = false;

        if ($user) {
            $user->setRegToken(null);
            $entityManager->persist($user);
            $entityManager->flush();
        } else {
            $error = true;
        }

        return $this->render('registration/validation.html.twig', ['error' => $error]);
    }
}
