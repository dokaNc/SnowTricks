<?php


namespace App\Controller\Backend;


use App\Entity\Tricks;
use App\Entity\Video;
use App\Form\VideoType;
use App\Service\VideoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class VideoController extends AbstractController
{
    /**
     * @var VideoService
     */
    private $videoService;

    public function __construct(VideoService $videoService)
    {
        $this->videoService = $videoService;
    }

    /**
     * @Route("user/tricks/{tricks}/video/add", name="video.add")
     * @param Request $request
     * @param Tricks $tricks
     * @return RedirectResponse|Response
     */
    public function add(Request $request, Tricks $tricks)
    {
        $video = new Video();
        $form_video = $this->createForm(VideoType::class, $video);
        $form_video->handleRequest($request);

        if ($form_video->isSubmitted() && $form_video->isValid()) {
            $this->videoService->addVideo($video, $tricks);
        }

        return $this->render('front/tricks/video.html.twig', [
            'tricksId' => $tricks->getId(),
            'videos' => $tricks->getVideos(),
            'formVideo' => $form_video->createView(),
        ]);
    }

    /**
     * @Route("trick/video/delete/{id}", name="video.delete")
     * @param Video $video
     * @return void
     */
    public function delete(Video $video)
    {
        $this->videoService->deleteVideo($video);
        echo 'ok';
        exit;
    }
}