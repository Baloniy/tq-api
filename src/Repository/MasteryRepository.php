<?php

namespace App\Repository;

use App\Entity\Mastery;
use App\Exception\MasteryNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Mastery>
 *
 * @method Mastery|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mastery|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mastery[]    findAll()
 * @method Mastery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MasteryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mastery::class);
    }

    /**
     * @return Mastery[]
     */
    public function findAllSortedByName(): array
    {
        return $this->findBy([], ['name' => Criteria::ASC]);
    }

    public function findOneById(int $id): Mastery
    {
        $mastery = $this->find($id);

        if ($mastery === null) {
            throw new MasteryNotFoundException();
        }

        return $mastery;
    }
}
