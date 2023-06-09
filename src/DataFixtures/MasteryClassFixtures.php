<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;

class MasteryClassFixtures extends AbstractFixture
{
    public static array $data = [
        'storm' => [
            'storm' => 'Stormcaller',
            'dream' => 'Prophet',
            'spirit' => 'Oracle',
            'defense' => 'Paladin',
            'earth' => 'Elementalist',
            'hunting' => 'Sage',
            'nature' => 'Druid',
            'warfare' => 'Thane',
            'rune' => 'Thunderer',
            'rogue' => 'Sorcerer',
            'neidan' => 'Channeler'
        ],
        'dream' => [
            'dream' => 'Seer',
            'spirit' => 'Diviner',
            'storm' => 'Prophet',
            'defense' => 'Templar',
            'earth' => 'Evoker',
            'hunting' => 'Haruspex',
            'nature' => 'Ritualist',
            'warfare' => 'Harbinger',
            'rune' => 'Seidr Worker',
            'rogue' => 'Dreamkiller',
            'neidan' => 'Contemplator'
        ],
        'rune' => [
            'dream' => 'Seidr Worker',
            'spirit' => 'Shaman',
            'storm' => 'Thunderer',
            'defense' => 'Runesmith',
            'earth' => 'Stonespeaker',
            'hunting' => 'Dragon Hunter',
            'nature' => 'Skinchanger',
            'warfare' => 'Berserker',
            'rune' => 'Runemaster',
            'rogue' => 'Trickster',
            'neidan' => 'Esoterist'
        ],
        'spirit' => [
            'dream' => 'Diviner',
            'spirit' => 'Theurgist',
            'storm' => 'Oracle',
            'defense' => 'Spellbinder',
            'earth' => 'Conjurer',
            'hunting' => 'Bone Charmer',
            'nature' => 'Soothsayer',
            'warfare' => 'Spellbreaker',
            'rune' => 'Shaman',
            'rogue' => 'Warlock',
            'neidan' => 'Spiritualist'
        ],
        'rogue' => [
            'dream' => 'Dreamkiller',
            'spirit' => 'Warlock',
            'storm' => 'Sorcerer',
            'defense' => 'Corsair',
            'earth' => 'Magician',
            'hunting' => 'Brigand',
            'nature' => 'Illusionist',
            'warfare' => 'Assassin',
            'rune' => 'Пройдоха',
            'rogue' => 'Trickster',
            'neidan' => 'Disruptor'
        ],
        'nature' => [
            'dream' => 'Ritualist',
            'spirit' => 'Soothsayer',
            'storm' => 'Druid',
            'defense' => 'Guardian',
            'earth' => 'Summoner',
            'hunting' => 'Ranger',
            'nature' => 'Wanderer',
            'warfare' => 'Champion',
            'rune' => 'Skinchanger',
            'rogue' => 'Illusionist',
            'neidan' => 'Hermit'
        ],
        'hunting' => [
            'dream' => 'Haruspex',
            'spirit' => 'Bone Charmer',
            'storm' => 'Sage',
            'defense' => 'Warden',
            'earth' => 'Avenger',
            'hunting' => 'Hunter',
            'nature' => 'Ranger',
            'warfare' => 'Slayer',
            'rune' => 'Dragon Hunter',
            'rogue' => 'Brigand',
            'neidan' => 'Pilgrim'
        ],
        'warfare' => [
            'dream' => 'Harbinger',
            'spirit' => 'Spellbreaker',
            'storm' => 'Thane',
            'defense' => 'Conqueror',
            'earth' => 'Battlemage',
            'hunting' => 'Slayer',
            'nature' => 'Champion',
            'warfare' => 'Warrior',
            'rune' => 'Berserker',
            'rogue' => 'Assassin',
            'neidan' => 'Daoist'
        ],
        'earth' => [
            'dream' => 'Evoker',
            'spirit' => 'Conjurer',
            'storm' => 'Elementalist',
            'defense' => 'Juggernaut',
            'earth' => 'Pyromancer',
            'hunting' => 'Avenger',
            'nature' => 'Summoner',
            'warfare' => 'Battlemage',
            'rune' => 'Stonespeaker',
            'rogue' => 'Magician',
            'neidan' => 'Wu'
        ],
        'defense' => [
            'dream' => 'Templar',
            'spirit' => 'Spellbinder',
            'storm' => 'Paladin',
            'defense' => 'Defender',
            'earth' => 'Juggernaut',
            'hunting' => 'Warden',
            'nature' => 'Guardian',
            'warfare' => 'Conqueror',
            'rune' => 'Runesmith',
            'rogue' => 'Corsair',
            'neidan' => 'Monk'
        ],
        'neidan' => [
            'dream' => 'Contemplator',
            'spirit' => 'Spiritualist',
            'storm' => 'Channeler',
            'defense' => 'Monk',
            'earth' => 'Wu',
            'hunting' => 'Pilgrim',
            'nature' => 'Hermit',
            'warfare' => 'Daoist',
            'rune' => 'Esoterist',
            'rogue' => 'Disruptor',
            'neidan' => 'Neidan'
        ],
    ];

    public function load(ObjectManager $manager): bool
    {
        return true;
    }
}
