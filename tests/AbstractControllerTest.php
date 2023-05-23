<?php

declare(strict_types=1);

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AbstractControllerTest extends WebTestCase
{
    protected KernelBrowser $client;

    public function setUp(): void
    {
        $this->client = static::createClient();
    }

    protected function assertJsonResponseWithCode(int $statusCode = 200): void
    {
        self::assertResponseHeaderSame('Content-Type', 'application/json');
        self::assertResponseStatusCodeSame($statusCode);
    }

    protected function extractDataFromResponse(): array
    {
        return json_decode($this->client->getResponse()->getContent(), true, 512, JSON_THROW_ON_ERROR);
    }
}
