<?php

namespace App\DataFixtures;

use App\Entity\Equipment;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EquipmentFixtures extends AbstractFixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public static array $data = [
        [
            'name' => 'Fervor of Leucetius', // Топор
            'type' => 'Axe',
            'tag' => 'x2tagUWeapon029',
            'itemLevel' => 61,
            'levelRequirement' => 51,
            'classification' => 'Legendary',
            'dexterityRequirement' => 170,
            'strengthRequirement' => 455,
            'properties' => [
                'characterAttackSpeed' => 'Speed:  Average',
                'characterAttackSpeedModifier' => '+25% Attack Speed',
                'characterLife' => '+110 Health',
                'characterStrengthModifier' => '+10% Strength',
                'defensivePoison' => '25% Poison Resistance',
                'itemSkillName' => [
                    'level' => 4,
                    'tag' => 'tagSkillName005',
                ],
                'offensiveLifeLeech' => '10% of Attack damage converted to Health',
                'offensivePhysical' => '155 ~ 167 Physical Damage',
                'offensiveTotalDamageModifier' => '+20% Total Damage',
                'petBonus' => [
                    'offensiveLifeLeech' => '20% of Attack damage converted to Health',
                    'offensiveTotalDamageModifier' => '+20% Total Damage',
                ],
            ],
        ],
        [
            'name' => 'Bladestring', // Лук
            'type' => 'Bow',
            'tag' => 'xtagUWeapon036',
            'itemLevel' => 75,
            'levelRequirement' => 52,
            'classification' => 'Legendary',
            'dexterityRequirement' => 488,
            'strengthRequirement' => 161,
            'properties' => [
                'characterAttackSpeed' => 'Speed:  Very Slow',
                'characterDefensiveAbility' => '+150 Defensive Ability',
                'characterDexterity' => '+33 Dexterity',
                'offensiveLifeLeech' => '11% of Attack damage converted to Health',
                'offensivePhysical' => '207 ~ 225 Physical Damage',
                'offensivePhysicalModifier' => '+15% Physical Damage',
                'offensivePierce' => '49 ~ 69 Piercing Damage',
                'offensivePierceModifier' => '+15% Pierce Damage',
                'offensivePierceRatio' => '25% Pierce Ratio',
                'offensiveSlowLifeLeachModifier' => '+50% Life Leech ',
                'retaliationPhysical' => '30.0% Chance of 190 Physical Retaliation',
            ],
        ],
        [
            'name' => 'Grim Companion', // Палиця
            'type' => 'Mace',
            'tag' => 'x3tagU_Club04',
            'itemLevel' => 56,
            'levelRequirement' => 45,
            'classification' => 'Legendary',
            'dexterityRequirement' => 139,
            'intelligenceRequirement' => 475,
            'strengthRequirement' => 1,
            'properties' => [
                'augmentAllLevel' => '+1 to all Skills',
                'augmentSkillName1' => [
                    'name' => '+3 to Soul Vortex',
                    'tag' => 'x3tagSkillSpiritSoulVortex-1',
                ],
                'augmentSkillName2' => [
                    'name' => '+3 to Rune Storm',
                    'tag' => 'x3tagSkillRunesRunestorm',
                ],
                'characterAttackSpeed' => 'Speed:  Slow',
                'characterIncreasedExperience' => '+10% Increased Experience',
                'characterIntelligenceModifier' => '+10% Intelligence',
                'offensiveBaseCold' => '50 ~ 80 Cold Damage',
                'offensiveBaseLife' => '50 ~ 80 Vitality Damage',
                'offensivePercentCurrentLife' => "10% Reduction to Enemy's Health",
                'offensivePhysical' => '50 ~ 65 Physical Damage',
                'offensiveSlowCold' => '120 Frostburn Damage over 3.0 Seconds',
                'offensiveSlowLifeLeach' => '120 Life Leech over 3.0 Seconds',
                'offensiveSlowManaLeach' => '120 Energy Leech over 3.0 Seconds',
                'petBonus' => [
                    'defensiveElementalResistance' => '10% Elemental Resistance',
                    'defensiveLife' => '10% Vitality Damage Resistance',
                    'skillCooldownReduction' => '-20% Recharge',
                ],
            ],
        ],
        [
            'name' => 'Aionios', // Щит
            'type' => 'Spear',
            'tag' => 'xtagUWeapon005',
            'itemLevel' => 80,
            'levelRequirement' => 54,
            'classification' => 'Legendary',
            'strengthRequirement' => 567,
            'properties' => [
                'characterDefensiveAbility' => '+200 Defensive Ability',
                'characterDodgePercent' => '8% Chance to Dodge Attacks',
                'defensiveBlock' => '59% Chance to block 881 damage',
                'defensiveElementalResistance' => '60% Elemental Resistance',
                'defensivePhysical' => '8% Physical Resistance',
                'defensivePierce' => '60% Pierce Resistance',
                'defensivePoison' => '60% Poison Resistance',
                'defensiveProtectionModifier' => '+20% Armor Protection',
                'offensivePhysical' => '266 Physical Damage',
            ],
        ],
        [
            'name' => 'Longquan', // Копьо
            'type' => 'Axe',
            'tag' => 'x4tagU_Spear01',
            'itemLevel' => 70,
            'levelRequirement' => 63,
            'classification' => 'Legendary',
            'dexterityRequirement' => 520,
            'intelligenceRequirement' => 50,
            'strengthRequirement' => 250,
            'properties' => [
                'augmentMasteryName1' => [
                    'name' => '+1 to all skills in Neidan Mastery',
                    'tag' => 'x4tagNeidanMastery',
                ],
                'characterAttackSpeed' => 'Speed:  Slow',
                'characterAttackSpeedModifier' => '+15% Attack Speed',
                'defensiveBleeding' => '50% Bleeding Resistance',
                'offensivePhysical' => '330 ~ 370 Physical Damage',
                'offensivePierceRatio' => '25% Pierce Ratio',
                'offensiveSlowBleeding' => '210 Bleeding Damage over 3.0 Seconds',
                'offensiveSlowLifeLeach' => '240 Life Leech over 3.0 Seconds',
                'offensiveTotalDamageModifier' => '+10% Total Damage',
                'offensiveTotalResistanceReductionPercent' => '10.0% Reduced Resistances for 3.0 Seconds',
            ],
        ],
        [
            'name' => 'Encompassing Thought ', // Посох
            'type' => 'Staff',
            'tag' => 'x4tagU_Staff07',
            'itemLevel' => 70,
            'levelRequirement' => 64,
            'classification' => 'Legendary',
            'dexterityRequirement' => 50,
            'intelligenceRequirement' => 520,
            'strengthRequirement' => 50,
            'properties' => [
                'augmentMasteryName1' => [
                    'name' => '+1 to all skills in Neidan Mastery',
                    'tag' => 'x4tagNeidanMastery',
                ],
                'characterAttackSpeed' => 'Speed:  Very Slow',
                'characterIntelligence' => '+50 Intelligence',
                'characterLife' => '+200 Health',
                'characterLifeRegenModifier' => '+10% Health Regeneration',
                'characterMana' => '+500 Energy',
                'characterManaRegenModifier' => '+20% Energy Regeneration',
                'defensiveElementalResistance' => '25% Elemental Resistance',
                'defensiveSlowManaLeach' => '15% Energy Leech Resistance',
                'offensiveBaseLightning' => '215 ~ 312 Lightning Damage',
                'offensiveManaDrain' => '2.0% Chance of 200% Energy Drain (50% of lost Energy as Damage)',
                'offensiveSlowManaLeach' => '186 Energy Leech over 3.0 Seconds',
            ],
        ],
        [
            'name' => 'Lavateinn', // Меч
            'type' => 'Sword',
            'tag' => 'x2tagUWeapon017',
            'itemLevel' => 79,
            'levelRequirement' => 63,
            'classification' => 'Legendary',
            'dexterityRequirement' => 342,
            'strengthRequirement' => 420,
            'properties' => [
                'augmentMasteryName1' => [
                    'name' => '+2 to all skills in Earth Mastery',
                    'tag' => 'tagSkillName098',
                ],
                'characterAttackSpeed' => 'Speed:  Fast',
                'characterLifeRegen' => '+5.0 Health Regeneration per second',
                'defensiveFire' => '50% Fire Resistance',
                'defensiveFreeze' => '50% Reduced Freeze Duration',
                'itemSkillName' => [
                    'level' => 7,
                    'tag' => 'x2tagSkillOther04',
                ],
                'offensiveFire' => '110 Fire Damage',
                'offensiveFireModifier' => '+40% Fire Damage',
                'offensivePhysical' => '224 ~ 228 Physical Damage',
                'offensivePhysicalModifier' => '+40% Physical Damage',
                'offensivePierceRatio' => '10% Pierce Ratio',
                'offensiveSlowFire' => '660 Burn Damage over 3.0 Seconds',
                'offensiveSlowFireModifier' => '+40% Burn Damage ',
                'offensiveTotalResistanceReductionPercent' => '20.0% Reduced Resistances for 3.0 Seconds',
            ],
        ],
        [
            'name' => "Gorgon's Edge", // Метат
            'type' => 'Throwing',
            'tag' => 'x2tagUWeapon058',
            'itemLevel' => 65,
            'levelRequirement' => 54,
            'classification' => 'Legendary',
            'dexterityRequirement' => 370,
            'strengthRequirement' => 274,
            'properties' => [
                'augmentMasteryName1' => [
                    'name' => '+1 to all skills in Rogue Mastery',
                    'tag' => 'tagSkillName050',
                ],
                'characterAttackSpeed' => 'Speed:  Fast',
                'characterAttackSpeedModifier' => '+20% Attack Speed',
                'defensivePetrify' => '50% Reduced Petrify Duration',
                'offensiveFear' => '10.0% Chance of 2.0 ~ 3.0 second(s) of Fear',
                'offensiveFumble' => '20.0% Chance to Fumble attacks for 3.0 Seconds',
                'offensivePhysical' => '137 ~ 146 Physical Damage',
                'offensivePierceRatio' => '10% Pierce Ratio',
                'offensiveProjectileFumble' => '40.0% Chance of Impaired Aim for 3.0 Seconds',
                'offensiveSlowPoison' => '600 ~ 1200 Poison Damage over 3.0 Seconds',
                'offensiveSlowTotalSpeed' => '20.0% Slowed for 3.0 Seconds',
                'offensiveTotalResistanceReductionPercent' => '20.0% Reduced Resistances for 3.0 Seconds',
            ],
        ],
        [
            'name' => "Crown of Dockma'Ar", // Голова
            'type' => 'Head',
            'tag' => 'xtagUArmor117',
            'itemLevel' => 59,
            'levelRequirement' => 43,
            'classification' => 'Legendary',
            'dexterityRequirement' => 156,
            'intelligenceRequirement' => 396,
            'properties' => [
                'augmentAllLevel' => '+1 to all Skills',
                'characterDexterity' => '+22 Dexterity',
                'characterIntelligence' => '+22 Intelligence',
                'characterMana' => '+420 Energy',
                'characterManaRegenModifier' => '+20% Energy Regeneration',
                'defensiveDisruption' => '100% Skill Disruption Protection',
                'defensiveElementalResistance' => '50% Elemental Resistance',
                'defensiveProtection' => '250 Armor',
                'offensiveElementalModifier' => '+25% Elemental Damages',
                'retaliationStun' => '10.0% Chance of 1 second(s) of Stun Retaliation',
            ],
        ],
        [
            'name' => 'Armor of Anubis', // Броня
            'type' => 'Torso',
            'tag' => 'tagUArmor304',
            'itemLevel' => 65,
            'levelRequirement' => 45,
            'classification' => 'Legendary',
            'strengthRequirement' => 380,
            'properties' => [
                'characterDexterity' => '+38 Dexterity',
                'characterLife' => '+344 Health',
                'defensiveBleeding' => '100% Bleeding Resistance',
                'defensivePoison' => '120% Poison Resistance',
                'defensiveProtection' => '460 Armor',
                'offensivePierceModifier' => '+25% Pierce Damage',
                'offensiveSlowBleedingModifier' => '+25% Bleeding Damage ',
                'offensiveSlowPoisonModifier' => '+25% Poison Damage ',
                'retaliationSlowBleeding' => '30.0% Chance of 240 Bleeding Damage Retaliation over 3.0 Seconds',
            ],
        ],
        [
            'name' => 'Heartsong Armlets', // Руки
            'type' => 'Arm',
            'tag' => 'tagUArmor052',
            'itemLevel' => 65,
            'levelRequirement' => 45,
            'classification' => 'Legendary',
            'dexterityRequirement' => 168,
            'intelligenceRequirement' => 438,
            'properties' => [
                'augmentMasteryName1' => [
                    'name' => '+1 to all skills in Nature Mastery',
                    'tag' => 'tagSkillName065',
                ],
                'characterDexterity' => '+30 Dexterity',
                'characterIntelligence' => '+30 Intelligence',
                'characterLife' => '+370 Health',
                'characterManaRegenModifier' => '+30% Energy Regeneration',
                'defensiveBleeding' => '50% Bleeding Resistance',
                'defensiveLife' => '50% Vitality Damage Resistance',
                'defensiveProtection' => '291 Armor',
                'defensiveSlowLifeLeach' => '50% Life Leech Resistance',
            ],
        ],
        [
            'name' => "Esus' Travelling Boots", // Ноги
            'type' => 'Leg',
            'tag' => 'x2tagUArmor079',
            'itemLevel' => 77,
            'levelRequirement' => 54,
            'strengthRequirement' => 186,
            'classification' => 'Legendary',
            'dexterityRequirement' => 484,
            'properties' => [
                'augmentSkillName1' => [
                    'name' => '+4 to Trail Blazing',
                    'tag' => 'tagSkillName093',
                ],
                'augmentSkillName2' => [
                    'name' => '+4 to Ardor',
                    'tag' => 'tagSkillName006',
                ],
                'characterRunSpeedModifier' => '+40% Movement Speed',
                'defensiveBleeding' => '25% Bleeding Resistance',
                'defensiveFreeze' => '50% Reduced Freeze Duration',
                'defensivePetrify' => '50% Reduced Petrify Duration',
                'defensivePierce' => '40% Pierce Resistance',
                'defensiveProtection' => '652 Armor',
                'defensiveSleep' => '50% Sleep Resistance',
                'defensiveStun' => '25% Stun Resistance',
                'defensiveTrap' => '75% Reduced Entrapment Duration',
                'itemSkillName' => [
                    'level' => 1,
                    'tag' => 'x2tagSkillOther24',
                    'trigger' => ' (Activated upon taking melee damage)',
                ],
            ],
        ],
        [
            'name' => "Persephone's Ring",
            'type' => 'Ring',
            'tag' => 'xtagUArmor008',
            'itemLevel' => 69,
            'levelRequirement' => 46,
            'classification' => 'Legendary',
            'properties' => [
                'characterDefensiveAbility' => '+100 Defensive Ability',
                'characterDexterity' => '+45 Dexterity',
                'defensiveDisruption' => '35% Skill Disruption Protection',
                'defensiveElementalResistance' => '45% Elemental Resistance',
                'offensiveColdModifier' => '+20% Cold Damage',
                'offensiveTotalDamageModifier' => '+5% Total Damage',
                'skillManaCostReduction' => '-10% Energy Cost',
                'skillProjectileSpeedModifier' => '25% Increase in Projectile Speed',
            ],
        ],
        [
            'name' => 'Amulet of Hygeia',
            'type' => 'Amulet',
            'tag' => 'tagUArmor073',
            'itemLevel' => 50,
            'levelRequirement' => 39,
            'classification' => 'Legendary',
            'properties' => [
                'characterLife' => '+210 Health',
                'characterLifeRegenModifier' => '+120% Health Regeneration',
                'defensiveBleeding' => '17% Bleeding Resistance',
                'defensiveDisruption' => '17% Skill Disruption Protection',
                'defensiveElementalResistance' => '17% Elemental Resistance',
                'defensivePierce' => '17% Pierce Resistance',
                'defensivePoison' => '17% Poison Resistance',
                'defensiveProtectionModifier' => '+20% Armor Protection',
                'defensiveSlowLifeLeach' => '17% Life Leech Resistance',
                'defensiveSlowManaLeach' => '17% Energy Leech Resistance',
                'defensiveStun' => '17% Stun Resistance',
            ],
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::getData() as $data) {
            $type = $this->getReference($data['type']);

            $equipment = new Equipment(
                equipmentType: $type,
                itemLevel: $data['itemLevel'],
                name: $data['name'],
                tag: $data['tag'],
                properties: $data['properties'],
                levelRequirement: $data['levelRequirement'],
                classification: $data['classification'],
                dexterityRequirement: $data['dexterityRequirement'] ?? null,
                intelligenceRequirement: $data['intelligenceRequirement'] ?? null,
                strengthRequirement: $data['strengthRequirement'] ?? null
            );

            $manager->persist($equipment);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EquipmentTypeFixtures::class,
        ];
    }

    public static function getGroups(): array
    {
        return ['equipment'];
    }
}
