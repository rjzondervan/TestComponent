<?php

namespace App\Repository;

use App\Entity\Konijn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Konijn|null find($id, $lockMode = null, $lockVersion = null)
 * @method Konijn|null findOneBy(array $criteria, array $orderBy = null)
 * @method Konijn[]    findAll()
 * @method Konijn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KonijnRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Konijn::class);
    }

    // /**
    //  * @return Konijn[] Returns an array of Konijn objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Konijn
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
