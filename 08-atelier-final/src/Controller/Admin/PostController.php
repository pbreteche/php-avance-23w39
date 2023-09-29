<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/post')]
class PostController extends AbstractController
{
    #[Route('', methods: 'POST')]
    public function new(
        Request $request,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        EntityManagerInterface $manager,
    ): Response {
        $post = $serializer->deserialize($request->getContent(), Post::class, 'json');
        $violations = $validator->validate($post);

        if (0 < $violations->count()) {
            return $this->json(['errors' => $violations], Response::HTTP_PRECONDITION_FAILED);
        }

        $manager->persist($post);
        $manager->flush();

        return $this->json('', Response::HTTP_CREATED);
    }
}