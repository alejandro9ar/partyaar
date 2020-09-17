<?php

namespace App\Repository;

use App\Entity\Puntuation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Puntuation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Puntuation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Puntuation[]    findAll()
 * @method Puntuation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PuntuationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Puntuation::class);
    }

    // /**
    //  * @return Puntuation[] Returns an array of Puntuation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Puntuation
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
