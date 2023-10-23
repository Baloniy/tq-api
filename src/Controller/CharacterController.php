<?php

declare(strict_types=1);

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Dto\Character\CharacterRequestDto;
use App\Service\CharacterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractController
{
    public function __construct(
        private readonly CharacterService $service
    ) {
    }

    #[Route(path: '/api/character', name: 'app_characters', methods: ["GET"])]
    public function index(): JsonResponse
    {
        return $this->json($this->service->getAllUserCharacters());
    }

    #[Route(path: '/api/character/{id}', name: 'app_character_item', methods: ["GET"])]
    public function item(int $id): JsonResponse
    {
        return $this->json($this->service->getCharacter($id));
    }

    #[Route(path: '/api/character', name: 'app_character_new', methods: ["POST"])]
    public function create(#[RequestBody] CharacterRequestDto $characterRequestDto): JsonResponse
    {
        $this->service->create($characterRequestDto);

        return $this->json([
            'message' => 'Character was created successfully!',
        ]);
    }
}
