<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Form\ForgottenPasswordFormType;
use App\Form\ResetPasswordFormType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            $this->addFlash('info', 'Welcome to SnowTricks, you are now connected.');
            return $this->redirectToRoute('app_home');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('security/login.html.twig', [
        'last_username' => $lastUsername,
        'error' => $error,
        'current_menu' => 'login'
    ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        return $this->redirectToRoute('pages/home.html.twig');
    }

    /**
     * @Route("/forgottenPassword", name="app_forgotten_password")
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param \Swift_Mailer $mailer
     * @return Response
     */
    public function forgottenPassword(Request $request, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer ): Response
    {
        $userInfo = ['username' => null];
        $form = $this->createForm(ForgottenPasswordFormType::class, $userInfo);
        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) {
            $userInfo = $form->getData();
            $username = $userInfo['username'];
            $entityManager = $this->getDoctrine()->getManager();
            $user = $entityManager->getRepository(User::class)->findOneBy(['username' => $username]);
            /* @var $user User */
            if ($user === null) {
                $this->addFlash('danger', 'Unknown Username');
                return $this->redirectToRoute('home');
            }
            // generate uuid for validation token
            $regToken = uuid_create((UUID_TYPE_RANDOM));

            try {
                $user->setRegToken($regToken);
                $entityManager->flush();
            } catch (\Exception $e) {
                $this->addFlash('warning', $e->getMessage());

                return $this->redirectToRoute('home');
            }
            $url = $this->generateUrl('app_reset_password', array('reg_token' => $regToken), UrlGeneratorInterface::ABSOLUTE_URL);
            $message = (new \Swift_Message('Forgot Password'))
                ->setFrom('cirpan.dogukan5959@gmail.com')
                ->setTo($user->getEmail())
                ->setBody("Reset password link: " . $url, 'text/html');
            $mailer->send($message);
            $this->addFlash('warning', 'Check your email and click on the reset password link, thank you.');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('security/forgotten_password.html.twig', [
            'forgottenPasswordForm' => $form->createView()]);
    }

    /**
     * @Route("/reset_password/{reg_token}", name="app_reset_password")
     */
    public function resetPassword(Request $request, string $reg_token, UserPasswordEncoderInterface $passwordEncoder)
    {
        $form = $this->createForm(ResetPasswordFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();
            $username = $form->get('username')->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $user = $entityManager->getRepository(User::class)->findOneBy(['reg_token' => $reg_token]);
            /* @var $user User */
            if ($user === null or $username != $user->getUsername()) {
                $this->addFlash('danger', 'Unknown User');

                return $this->redirectToRoute('app_home');
            }
            $user->setRegToken(null);
            $user->setPassword($passwordEncoder->encodePassword($user, $plainPassword));
            $entityManager->flush();
            $this->addFlash('info', 'Password updated !');

            return $this->redirectToRoute('app_login');
        }
        return $this->render('security/reset_password.html.twig', ['reg_token' => $reg_token,
            'resetPasswordForm' => $form->createView()]);
    }
}
