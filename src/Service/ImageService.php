<?php


namespace App\Service;


use App\Entity\Image;
use App\Entity\Tricks;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

class ImageService extends AbstractController
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var EntityManagerInterface
     */

    private $entityManager;
    /**
     * @var FileUploader
     */

    private $fileUploader;

    public function __construct(EntityManagerInterface $entityManager,
                                RouterInterface $router, FileUploader $fileUploader)
    {
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->fileUploader = $fileUploader;
    }

    public function addImage(Image $image, Tricks $tricks, $imageFile, $mainImage)
    {
        if ($imageFile) {
            $imageFileName = $this->fileUploader->upload($imageFile);
            $image->setImage($imageFileName);
        }

        if ($mainImage) {
            foreach ($tricks->getImages() as $tricks_image) {
                if ($tricks_image->getMainImage()) {
                    $tricks_image->setMainImage(0);
                }
            }
        }

        $image->setTricks($tricks);
        $image->setCreatedAt(new \DateTime());

        $this->entityManager->persist($image);
        $this->entityManager->flush();

        $response = new RedirectResponse($this->router->generate('user.tricks.edit', ['id' => $tricks->getId()]));
        return $response->send();
    }

    public function deleteImage(Image $image)
    {
        $filesystem = new Filesystem();
        $imagePath = 'images/tricks/'.$image->getName();

        if ($filesystem->exists($imagePath)) {
            $filesystem->remove($imagePath);
        }
        $this->entityManager->remove($image);
        $this->entityManager->flush();
        $this->session->getFlashBag()->add('success', 'Image supprimée');
    }

}