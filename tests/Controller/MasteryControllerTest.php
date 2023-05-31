<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use App\DataFixtures\MasteryFixtures;
use App\Tests\AbstractControllerTest;

class MasteryControllerTest extends AbstractControllerTest
{
    private string $uri = '/api/mastery';

    public function testMastery()
    {
        $masteryFixture = MasteryFixtures::getRow();

        $this->client->request('GET', $this->uri);

        $responseContent = $this->extractDataFromResponse();

        $this->assertJsonResponseWithCode();

        $this->assertEquals($masteryFixture['id'], $responseContent[0]['id']);
        $this->assertEquals($masteryFixture['name'], $responseContent[0]['name']);
        $this->assertEquals($masteryFixture['slug'], $responseContent[0]['slug']);
        $this->assertEquals($masteryFixture['tag'], $responseContent[0]['tag']);
        $this->assertEquals($masteryFixture['image'], $responseContent[0]['image']);
        $this->assertEquals($masteryFixture['description'], $responseContent[0]['description']);
    }

    public function testIndex()
    {
        $masteryFixture = MasteryFixtures::getRow();

        $this->client->request('GET', $this->uri . '/1');

        $responseContent = $this->extractDataFromResponse();

        $this->assertJsonResponseWithCode();

        $this->assertEquals($masteryFixture['id'], $responseContent['id']);
        $this->assertEquals($masteryFixture['name'], $responseContent['name']);
        $this->assertEquals($masteryFixture['slug'], $responseContent['slug']);
    }
}
