<?php

namespace App\Repository;

use App\Entity\Hond;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Hond|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hond|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hond[]    findAll()
 * @method Hond[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HondRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hond::class);
    }

    // /**
    //  * @return Hond[] Returns an array of Hond objects
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
    public function findOneBySomeField($value): ?Hond
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
