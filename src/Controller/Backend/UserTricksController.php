<?php

namespace App\Controller\Backend;

use App\Service\FileUploader;
use App\Entity\Tricks;
use App\Form\TricksType;
use App\Repository\TricksRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserTricksController extends AbstractController
{
    /**
     * @var TricksRepository
     */
    private $repository;
    /**
     * @var \Doctrine\Common\Persistence\ManagerRegistry
     */
    private $entityManager;


    public function __construct(TricksRepository $repository, ObjectManager $entityManager)
    {

        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/user", name="user.tricks.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index ()
    {
        $tricks = $this->repository->findAll();
        return $this->render('user/tricks/index.html.twig', compact ('tricks'));
    }

    /**
     * @Route ("/user/tricks/create", name="user.tricks.new")
     */
    public function new(Request $request, FileUploader $fileUploader)
    {
        $tricks = new Tricks();
        $form = $this->createForm(TricksType::class, $tricks);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $mainImage */
            $mainImageFile = $form['image']->getData();
            if ($mainImageFile) {
                $mainImage = $fileUploader->upload($mainImageFile);
                $tricks->setMainImage($mainImage);
            }


            $this->entityManager->persist($tricks);
            $this->entityManager->flush();
            $this->addFlash('info', 'Your Tricks have been added');
            return $this->redirectToRoute('user.tricks.index');
        }

        return $this->render('user/tricks/new.html.twig', [
            'tricks' => $tricks,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/{id}", name="user.tricks.edit", methods="GET|POST")
     * @param Tricks $tricks
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Tricks $tricks, Request $request, FileUploader $fileUploader)
    {
        $form = $this->createForm(TricksType::class, $tricks);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $mainImage */
            $mainImageFile = $form['image']->getData();
            if ($mainImageFile) {
                $mainImage = $fileUploader->upload($mainImageFile);
                $tricks->setMainImage($mainImage);
            }

            $this->entityManager->flush();
            $this->addFlash('info', 'Your Tricks have been edited');
            return $this->redirectToRoute('user.tricks.index');
        }

        return $this->render('user/tricks/edit.html.twig', [
            'tricks' => $tricks,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/{id}", name="user.tricks.delete", methods="DELETE")
     * @param Tricks $tricks
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Tricks $tricks, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $tricks->getId(), $request->get('_token'))) {
            $this->entityManager->remove($tricks);
            $this->entityManager->flush();
            $this->addFlash('info', 'Your Tricks have been deleted');
        }
        return $this->redirectToRoute('user.tricks.index');
    }
}