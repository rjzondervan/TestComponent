<?php

namespace App\Repository;

use App\Entity\Eend;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Eend|null find($id, $lockMode = null, $lockVersion = null)
 * @method Eend|null findOneBy(array $criteria, array $orderBy = null)
 * @method Eend[]    findAll()
 * @method Eend[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EendRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Eend::class);
    }

    // /**
    //  * @return Eend[] Returns an array of Eend objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Eend
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
