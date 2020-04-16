<?php

namespace App\Controller\Backend;

use App\Service\FileUploader;
use App\Service\TricksService;
use App\Entity\Tricks;
use App\Form\TricksType;
use App\Repository\TricksRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    /**
     * @var TricksService
     */
    private $tricksService;


    public function __construct(TricksRepository $repository, ObjectManager $entityManager, TricksService $tricksService)
    {

        $this->tricksService = $tricksService;
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/user/tricks", name="user.tricks.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index ()
    {
        $tricks = $this->repository->findAll();
        return $this->render('user/tricks/index.html.twig', compact ('tricks'));
    }

    /**
     * @Route ("/user/tricks/create", name="user.tricks.new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function add(Request $request)
    {
        $tricks = new Tricks();
        $form = $this->createForm(TricksType::class, $tricks);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->tricksService->addTrick($tricks);
        }

        return $this->render('user/tricks/new.html.twig', [
            'tricks' => $tricks,
            'current_menu' => 'new',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/tricks/{id}", name="user.tricks.edit", methods="GET|POST")
     * @param Tricks $tricks
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Tricks $tricks, Request $request)
    {
        $form = $this->createForm(TricksType::class, $tricks);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->tricksService->editTrick($tricks);
        }

        return $this->render('user/tricks/edit.html.twig', [
            'tricks' => $tricks,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("user/tricks/delete/{id}", name="tricks.delete")
     * @param Tricks $tricks
     * @return void
     */
    public function delete(Tricks $tricks)
    {
        $this->tricksService->deleteTrick($tricks);

        $this->addFlash(
            'success',
            'Your trick has been deleted'
        );
    }
}