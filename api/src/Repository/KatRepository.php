<?php

namespace App\Repository;

use App\Entity\Kat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Kat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kat[]    findAll()
 * @method Kat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kat::class);
    }

    // /**
    //  * @return Kat[] Returns an array of Kat objects
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
    public function findOneBySomeField($value): ?Kat
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
