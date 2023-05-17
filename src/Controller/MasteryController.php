<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\MasteryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/api/mastery', name: 'api_mastery_')]
class MasteryController extends AbstractController
{
    public function __construct(
        private readonly MasteryService $masteryService
    ) {
    }

    #[Route(name: '_list', methods: ['GET'])]
    public function index(): JsonResponse
    {
        return $this->json($this->masteryService->getMasteryList());
    }

    #[Route(path: '/{id}', name: '_item', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function mastery(int $id): JsonResponse
    {
        return $this->json($this->masteryService->getMastery($id));
    }
}
