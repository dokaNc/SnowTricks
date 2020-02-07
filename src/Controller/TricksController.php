<?php

namespace App\Controller;

use App\Entity\Tricks;
use App\Repository\TricksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TricksController extends AbstractController
{

    public function __construct(TricksRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/tricks", name="tricks.index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('tricks/index.html.twig' , [
            'current_menu' => 'tricks'
            ]);
    }

    /**
     * @Route("/tricks/{slug}-{id}", name="tricks.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Tricks $tricks
     * @return Response
     */
    public function show(Tricks $tricks, string $slug): Response
    {
        if ($tricks->getSlug() !== $slug) {
            return $this->redirectToRoute('tricks.show', [
                'id' => $tricks->getId(),
                'slug' => $tricks->getSlug()
            ], 301);
        }
        return $this->render('tricks/show.html.twig', [
            'tricks' => $tricks,
            'current_menu' => 'tricks'
            ]);
    }
}
