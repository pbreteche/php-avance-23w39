<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Security\Http\Attribute\IsGranted;
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
        #[CurrentUser] ?User $user,
    ): Response {
        $post = $serializer->deserialize($request->getContent(), Post::class, 'json', [
            'groups' => ['edit'],
        ]);
        $post->setWrittenBy($user);
        $violations = $validator->validate($post);

        if (0 < $violations->count()) {
            return $this->json(['errors' => $violations], Response::HTTP_PRECONDITION_FAILED);
        }

        $manager->persist($post);
        $manager->flush();

        return $this->json('', Response::HTTP_CREATED);
    }

    #[Route('/{id}', methods: 'PUT')]
    #[IsGranted('POST_EDIT', subject: 'post')]
    #[Cache(expires: 'tomorrow', public: true)]
    public function update(
        Post $post,
        Request $request,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        EntityManagerInterface $manager,
    ): Response {
        $serializer->deserialize($request->getContent(), Post::class, 'json', [
            'groups' => ['edit'],
            AbstractNormalizer::OBJECT_TO_POPULATE => $post,
        ]);
        $violations = $validator->validate($post);

        if (0 < $violations->count()) {
            return $this->json(['errors' => $violations], Response::HTTP_PRECONDITION_FAILED);
        }

        $manager->flush();

        return $this->json('');
    }
}