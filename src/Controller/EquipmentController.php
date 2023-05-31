<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\EquipmentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class EquipmentController extends AbstractController
{
    public function __construct(
        private readonly EquipmentService $equipmentService
    ) {
    }

    #[Route('/api/equipments', name: 'app_equipments', methods: ['GET'])]
    public function index(): JsonResponse
    {
        return $this->json($this->equipmentService->getEquipments());
    }
}
