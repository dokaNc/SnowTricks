<?php


namespace App\Service;


use App\Entity\Tricks;
use App\Entity\Video;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

class VideoService extends AbstractController
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, RouterInterface $router)
    {
        $this->entityManager = $entityManager;
        $this->router = $router;
    }

    public function addVideo(Video $video, Tricks $tricks)
    {
        $video->setTricks($tricks);

        $this->entityManager->persist($video);
        $this->entityManager->flush();

        $response = new RedirectResponse($this->router->generate('user.tricks.edit', ['id' => $tricks->getId()]));
        return $response->send();
    }

    public function deleteVideo(Video $video)
    {
        $this->entityManager->remove($video);
        $this->entityManager->flush();
        $this->addFlash('warning', 'Video deleted.');
    }
}