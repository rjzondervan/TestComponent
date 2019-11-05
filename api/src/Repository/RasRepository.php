<?php

namespace App\Repository;

use App\Entity\Ras;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ras|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ras|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ras[]    findAll()
 * @method Ras[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ras::class);
    }

    // /**
    //  * @return Ras[] Returns an array of Ras objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ras
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
