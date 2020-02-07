<?php

namespace App\Controller;

use App\Repository\TricksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     * @param TricksRepository $repository
     * @return Response
     */
    public function index(TricksRepository $repository): Response
    {
        $tricks = $repository->findLatest();
        return $this->render('pages/home.html.twig' , [
            'tricks' => $tricks,
            'current_menu' => 'home'
        ]);
    }

}