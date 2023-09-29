<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    #[Route('/', methods: 'GET')]
    public function index(): Response
    {
        $result = [
            'message' => 'Bonjour tout le monde',
        ];

        return new JsonResponse($result);
    }
}