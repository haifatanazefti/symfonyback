<?php

namespace App\Repository;

use App\Entity\Freelancercomp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Freelancercomp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Freelancercomp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Freelancercomp[]    findAll()
 * @method Freelancercomp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FreelancercompRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Freelancercomp::class);
    }

    // /**
    //  * @return Freelancercomp[] Returns an array of Freelancercomp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Freelancercomp
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
