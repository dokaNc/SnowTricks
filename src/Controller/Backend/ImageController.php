<?php


namespace App\Controller\Backend;

use App\Entity\Image;
use App\Entity\Tricks;
use App\Form\ImageType;
use App\Service\ImageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{
    /**
     * @var ImageService
     */
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * @Route("user/tricks/{tricks}/image/add", name="image.add")
     * @param Request $request
     * @param Tricks $tricks
     * @return RedirectResponse|Response
     */
    public function add(Request $request, Tricks $tricks)
    {
        $image = new Image();
        $form_image = $this->createForm(ImageType::class, $image);
        $form_image->handleRequest($request);

        if ($form_image->isSubmitted() && $form_image->isValid()) {
            $imageFile = $form_image['image']->getData();
            $this->imageService->addImage($image, $tricks, $imageFile, $image);
        }

        return $this->render('front/tricks/image.html.twig', [
            'trickId' => $tricks->getId(),
            'images' => $tricks->getImages(),
            'formImage' => $form_image->createView(),
        ]);
    }

    /**
     * @Route("user/tricks/image/delete/{id}", name="image.delete")
     * @param Image $image
     * @return string
     */
    public function delete(Image $image)
    {
        $this->imageService->deleteImage($image);
        echo 'ok';
        exit;
    }
}