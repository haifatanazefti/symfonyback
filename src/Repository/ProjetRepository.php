<?php

namespace App\Repository;

use App\Entity\Projet;

use App\Entity\Societe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Projet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Projet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Projet[]    findAll()
 * @method Projet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Projet::class);
    }

    // /**
    //  * @return Projet[] Returns an array of Projet objects
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
    public function findOneBySomeField($value): ?Projet
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getProjets()
{   $entityManager = $this->getEntityManager();
    $query = $entityManager->createQuery(
                        'SELECT p.idprojet , p.nom , p.export , p.duree , p.lieu , p.descri , p.prix , s.nom as Nsociete
                        FROM App\Entity\Projet p ,
                        App\Entity\Societe s
                        WHERE p.societe = s.idsoc
                        ORDER BY p.export desc 
                        
                        ');
                     return $query->getResult();
  
}

public function getsocietes(int $id)
{   $entityManager = $this->getEntityManager();
    $query = $entityManager->createQuery(
                        'SELECT p.idprojet , p.nom , p.export , p.duree , p.lieu , p.descri , p.prix , count(f.idf) as nbr
                        FROM App\Entity\Projet p ,
                          App\Entity\Freelancepostule f
                        WHERE p.societe = :id
                        and p.idprojet= f.idp 
                        Group by p.idprojet 
                      
                        
                        ')->setParameter('id', $id);
                     return $query->getResult();
  
}

}
