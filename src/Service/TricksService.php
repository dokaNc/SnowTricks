<?php


namespace App\Service;

use App\Entity\Tricks;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


/**
 * Class TrickService
 * @package App\Service
 */
class TricksService extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * TrickService constructor.
     * @param EntityManagerInterface $entityManager
     * @param RouterInterface $router
     */
    public function __construct(EntityManagerInterface $entityManager, RouterInterface $router)
    {
        $this->entityManager = $entityManager;
        $this->router = $router;
    }

    /**
     * @param Tricks $tricks
     * @return RedirectResponse
     */
    public function addTrick(Tricks $tricks)
    {

        $this->entityManager->persist($tricks);
        $this->entityManager->flush();

        $response = new RedirectResponse($this->router->generate('user.tricks.edit', [
            'id' => $tricks->getId()
        ]));
        return $response->send();
    }

    public function editTrick(Tricks $tricks)
    {
        $this->entityManager->flush();

        $this->addFlash('info', 'Tricks N°' . $tricks->getId() . ' edited');

        $response = new RedirectResponse($this->router->generate('user.tricks.index', [
            'id' => $tricks->getId(),
            'slug' => $tricks->getSlug()
        ]));
        return $response->send();
    }

    /**
     * @param Tricks $tricks
     * @return RedirectResponse
     */
    public function deleteTrick(Tricks $tricks)
    {
        foreach ($tricks->getVideos() as $video) {
            $this->entityManager->remove($video);
        }

        foreach ($tricks->getImages() as $image) {
            $filesystem = new Filesystem();
            $imagePath = 'uploads/images/' . $image->getImage();

            if ($filesystem->exists($imagePath)) {
                $filesystem->remove($imagePath);
            }
            $this->entityManager->remove($image);
        }

        $this->entityManager->remove($tricks);
        $this->entityManager->flush();

        $this->addFlash('warning', 'Your tricks is deleted');

        $response = new RedirectResponse($this->router->generate('user.tricks.index'));
        return $response->send();
    }

    public function checkSlug(Tricks $tricks, $slug)
    {
        if ($tricks->getSlug() !== $slug) {
            $response = new RedirectResponse($this->router->generate('user.tricks.index', [
                'id' => $tricks->getId(),
                'slug' => $tricks->getSlug(),
                ]));
            return $response->send();
        }
    }
}