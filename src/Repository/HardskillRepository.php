<?php

namespace App\Repository;

use App\Entity\Hardskill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hardskill|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hardskill|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hardskill[]    findAll()
 * @method Hardskill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HardskillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hardskill::class);
    }

    // /**
    //  * @return Hardskill[] Returns an array of Hardskill objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hardskill
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
