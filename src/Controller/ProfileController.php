<?php


namespace App\Controller;


use App\Entity\PasswordUpdate;
use App\Form\AccountType;
use App\Form\PasswordUpdateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfileController extends AbstractController
{
    /**
     * @Route("/user/profile/", name="account_profile")
     *
     * @param Request $request
     * @param ObjectManager $entityManager
     * @return Response
     */
    public function updateProfile(Request $request, ObjectManager $entityManager)
    {
        $user = $this->getUser();

        $form = $this->createForm(AccountType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash(
                'info',
                "Your profile has been updated."
            );
        }

        return $this->render('user/account/profile.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/profile/password", name="account_password")
     *
     * @param Request $request
     * @param ObjectManager $entityManager
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function updatePassword(Request $request, ObjectManager $entityManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $passwordUpdate = new PasswordUpdate();

        $user = $this->getUser();

        $form = $this->createForm(PasswordUpdateType::class, $passwordUpdate);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            // Verify if the OldPassword is the same as that of User
            if(!password_verify($passwordUpdate->getOldPassword(), $user->getPassword())){

                $form->get('oldPassword')->addError(new FormError("Please enter your current password"));

            } else {
                // Manage error
                $newPassword = $passwordUpdate->getNewPassword();
                $hash = $passwordEncoder->encodePassword($user, $newPassword);

                $user->setPassword($hash);

                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash('info', 'Your password has been updated');

                return $this->redirectToRoute('account_profile');
            }
        }

        return $this->render('user/account/password.html.twig', [
            'form' => $form->createView()
        ]);
    }
}