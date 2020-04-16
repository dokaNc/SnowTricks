<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Tricks;
use App\Form\CommentType;
use App\Repository\TricksRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @param TricksRepository $repository
     * @return Response
     */
    public function index(TricksRepository $repository): Response
    {
        $tricks = $repository->findLatest();
        return $this->render('tricks/index.html.twig' , [
            'tricks' => $tricks,
            'current_menu' => 'tricks'
            ]);
    }

    /**
     * @Route("/tricks/{slug}-{id}", name="tricks.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Tricks $tricks
     * @param Request $request
     * @param ObjectManager $entityManager
     * @param string $slug
     * @return Response
     */
    public function show(Tricks $tricks, Request $request, ObjectManager $entityManager, string $slug): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $comment->setTrick($tricks)
                ->setAuthor($this->getUser());
            $entityManager->persist($comment);
            $entityManager->flush();
            $this->addFlash('success', "Your comment has been added");
        }
        if ($tricks->getSlug() !== $slug) {
            return $this->redirectToRoute('tricks.show', ['id'   => $tricks->getId(), 'slug' => $tricks->getSlug()], 301);
        }
        return $this->render('tricks/show.html.twig', [
            'tricks' => $tricks,
            'form' => $form->createView(),
            'current_menu' => 'tricks',
            'id' => $tricks->getId(),
            'slug' => $tricks->getSlug()
            ]);
    }

    /**
     * @Route("/tricks/comment/delete/{slug}-{idtricks}/{id}", name="comment.delete")
     * @param Comment $comment
     * @param string $slug
     * @param string $idtricks
     * @param ObjectManager $entityManager
     * @return Response
     */
    public function delete(Request $request, Comment $comment, ObjectManager $entityManager, string $slug, string $idtricks): Response
    {
        $entityManager->remove($comment);
        $entityManager->flush();

        $this->addFlash(
            'success',
            'Your comment has been deleted'
        );

        //var_dump($request->query->get('slug'));
       // exit();
        //return $this->redirectToRoute('tricks.show', [
        //    'id'   => $tricks->getId(),
        //    'slug' => $tricks->getSlug()
        //], 301);

        return $this->redirectToRoute('tricks.show', [
            'slug' => $slug,
            'id' => $idtricks
        ]);
    }
}
