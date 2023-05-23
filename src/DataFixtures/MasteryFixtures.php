<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Mastery;
use Doctrine\Persistence\ObjectManager;

class MasteryFixtures extends AbstractFixture
{
    public static array $data = [
        [
            'name' => 'Dream',
            'slug' => 'dream',
            'tag' => 'xtagSkillDreamName001',
            'image' => 'dream.png',
            'description' => 'Drawing power from the dream world, the Seer uses sheer force of will to dominate the battlefield. The arcane workings of the psyche, time and reality itself are all playthings for those who have mastered the secrets of the mind.',
        ],
        [
            'name' => 'Rune',
            'slug' => 'rune',
            'tag' => 'x2tagSkillRunesName001',
            'image' => 'rune.png',
            'description' => 'The warrior-shamans of the North inscribe their weapons and armor with magical runes, or cast them on the ground to control the battlefield. Drawing power from ecstasy of combat, they are both proficient in melee and able to unleash magical fury',
        ],
        [
            'name' => 'Storm',
            'slug' => 'storm',
            'tag' => 'tagSkillName018',
            'image' => 'storm.png',
            'description' => 'Excels at dealing massive lightning and cold damage to single opponents or small groups. The Stormcaller has limited personal defences but can slow, freeze and stun enemies with frost and thunder attacks',
        ],
        [
            'name' => 'Spirit',
            'slug' => 'spirit',
            'tag' => 'tagSkillName030',
            'image' => 'spirit.png',
            'description' => 'The Theurgist combines offence and defence with insidious life stealing skills that leech enemies vitality while bolstering their own. At higher levels the ability to summon a powerful Liche King dramatically increases damage-dealing ability.',
        ],
        [
            'name' => 'Rogue',
            'slug' => 'rogue',
            'tag' => 'tagSkillName050',
            'image' => 'rogue.png',
            'description' => 'The rogue is unmatched at dealing rapid damage to single opponents or wearing them down with poison and bleeding. Reliant on hit-and-run tactics, the Rogue is less well suited for handling hordes of enemies and must employ trickery to avoid being overwhelmed.',
        ],
        [
            'name' => 'Nature',
            'slug' => 'nature',
            'tag' => 'tagSkillName065',
            'image' => 'nature.png',
            'description' => 'The Wanderer can call on denizens of the forest to deal damage and shield them from enemies. Healing and defensive auras allow allies to survive longer and fight more effectively.',
        ],
        [
            'name' => 'Hunting',
            'slug' => 'hunting',
            'tag' => 'tagSkillName076',
            'image' => 'hunting.png',
            'description' => 'Master of bow and spear combat. Piercing attacks penetrate enemy armor and high level bow skills will tear through large groups of enemies. The Hunter must rely on speed and range to stay out of the reach of enemies.',
        ],
        [
            'name' => 'Warfare',
            'slug' => 'warfare',
            'tag' => 'tagSkillName001',
            'image' => 'warfare.png',
            'description' => 'The Warrior excels at dealing out physical damage but pays little heed to defence. With higher mastery levels the Warrior can learn to deal damage to several adversaries at once.',
        ],
        [
            'name' => 'Earth',
            'slug' => 'earth',
            'tag' => 'tagSkillName098',
            'image' => 'earth.png',
            'description' => 'Adept at raining down destruction over large hordes of enemies. With most skills designed to deal damage, the Pyromancer relies on a colossal Earth Elemental to hold the attention of enemies.',
        ],
        [
            'name' => 'Defence',
            'slug' => 'defense',
            'tag' => 'tagSkillName116',
            'image' => 'defense.png',
            'description' => 'The Defender specializes in surviving battles but offers little in the way of offensive enchantments. Many skills focus on utilizing the shield to deflect attacks and disable enemies.',
        ],
        [
            'name' => 'Neidan',
            'slug' => 'neidan',
            'tag' => 'tagSkillNameneidan',
            'image' => 'neidan.png',
            'description' => 'Master Neidan, the art of internal and external alchemy. Using a combination of deadly concoctions and abilities that make use of their inner energies, Neidan are a force to be reckoned with.',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::getData() as $masteryData) {
            $mastery = new Mastery(
                name: $masteryData['name'],
                slug: $masteryData['slug'],
                tag: $masteryData['tag'],
                image: $masteryData['image'],
                description: $masteryData['description']
            );

            $manager->persist($mastery);
        }

        $manager->flush();
    }
}
