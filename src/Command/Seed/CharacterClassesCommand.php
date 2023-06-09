<?php

declare(strict_types=1);

namespace App\Command\Seed;

use App\DataFixtures\MasteryClassFixtures;
use App\Entity\MasteryClass;
use App\Repository\MasteryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:seed-classes',
    description: 'Flush character classes data'
)]
class CharacterClassesCommand extends Command
{
    public function __construct(
        private readonly MasteryRepository $masteryRepository,
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $masters = $this->masteryRepository->findAllSortedByName();

        $classes = MasteryClassFixtures::getData();

        $characterClasses = [];
        foreach ($masters as $mastery) {

            if (!key_exists($mastery->getSlug(), $classes)) {
                continue;
            }

            $class = $classes[$mastery->getSlug()];
            $masteryClasses = [];
            foreach ($masters as $mastery2) {
                if (!key_exists($mastery2->getSlug(), $class)) {
                    continue;
                }

                $masteryClasses['mastery_id'] = $mastery;
                $masteryClasses['additional_mastery_id'] = $mastery2;
                $masteryClasses['name'] = $class[$mastery2->getSlug()];

                $characterClasses[] = $masteryClasses;
            }
        }

        $output->writeln('Start truncating table...');

        $this->truncateTable();

        $output->writeln('Table truncated');

        $this->persistClasses($characterClasses);

        $this->entityManager->flush();

        $output->writeln(sprintf("%s classes created successfully!", count($characterClasses)));

        return Command::SUCCESS;
    }

    private function persistClasses(array $characterClasses): void
    {
        $alreadySavedClasses = [];

        foreach ($characterClasses as $characterClass) {
            if (in_array($characterClass['name'], $alreadySavedClasses)) {
                continue;
            }

            $class = new MasteryClass(name: $characterClass['name']);
            $class->setMastery($characterClass['mastery_id']);
            $class->setAdditionalMastery($characterClass['additional_mastery_id']);

            $this->entityManager->persist($class);

            $alreadySavedClasses[] = $characterClass['name'];
        }
    }

    private function truncateTable(): void
    {
        $connection = $this->entityManager->getConnection();
        $platform = $connection->getDatabasePlatform();

        $connection->executeStatement(
            $platform->getTruncateTableSQL('mastery_classes', true)
        );
    }
}
