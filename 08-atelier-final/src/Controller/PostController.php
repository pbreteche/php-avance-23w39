<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\PostStateEnum;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/post')]
class PostController extends AbstractController
{
    #[Route('', methods: 'GET')]
    public function index(
        PostRepository $postRepository,
    ): Response {
        $posts = $postRepository->findBy(
            ['state' => PostStateEnum::Published],
            ['createdAt' => 'DESC'],
            10, 0,
        );

        $body = [
            'request_time' => time(),
            'data' => $posts,
        ];

        return $this->json($body, Response::HTTP_OK, [], [
            'groups' => ['teaser'],
        ]);
    }

    #[Route('/{id}', requirements: ['id' => '\d+'], methods: 'GET')]
    public function show(
        Post $post,
    ): Response {
        if ($post->getState() !== PostStateEnum::Published) {
            throw $this->createNotFoundException();
        }

        return $this->json(['request_time' => time(), 'data' => $post], Response::HTTP_OK, [], [
            'groups' => ['full'],
        ]);
    }
}
