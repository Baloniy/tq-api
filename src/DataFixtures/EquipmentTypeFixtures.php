<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\EquipmentType;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class EquipmentTypeFixtures extends AbstractFixture implements FixtureGroupInterface
{
    public static array $data = [
        'ArmorJewelry_Amulet' => 'Amulet',
        'ArmorJewelry_Ring' => 'Ring',
        'ArmorProtective_Forearm' => 'Arm',
        'ArmorProtective_Head' => 'Head',
        'ArmorProtective_LowerBody' => 'Leg',
        'ArmorProtective_UpperBody' => 'Torso',
        'WeaponArmor_Shield' => 'Shield',
        'WeaponHunting_Bow' => 'Bow',
        'WeaponHunting_RangedOneHand' => 'Throwing',
        'WeaponHunting_Spear' => 'Spear',
        'WeaponMagical_Staff' => 'Staff',
        'WeaponMelee_Axe' => 'Axe',
        'WeaponMelee_Mace' => 'Mace',
        'WeaponMelee_Sword' => 'Sword',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::getData() as $tag => $name) {
            $equipmentType = new EquipmentType(
                name: $name,
                tag: $tag
            );

            $manager->persist($equipmentType);

            $this->addReference($name, $equipmentType);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['equipment'];
    }
}
