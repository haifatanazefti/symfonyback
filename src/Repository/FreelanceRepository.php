<?php

namespace App\Repository;

use App\Entity\Freelance;
use App\Entity\Freelancepostule;
use App\Entity\Freelancecomp;
use App\Entity\Competance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Freelance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Freelance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Freelance[]    findAll()
 * @method Freelance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FreelanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Freelance::class);
    }

    // /**
    //  * @return Freelance[] Returns an array of Freelance objects
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
    public function findOneBySomeField($value): ?Freelance
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function getFreelance($id)
    {   $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
                            '  SELECT DISTINCT c.nomc 
                               FROM App\Entity\Freelancercomp fc ,
                               
                               App\Entity\Competence c 
                               WHERE fc.idf= :id AND  fc.idc= c.idc 
                            
                             ')->setParameter('id', $id);
                         return $query->getResult();
      
    }
    public function findF($idf , $idp)
    {   $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
                            '  SELECT DISTINCT f.idf , f.nom , f.prenom ,f.datenaiss, f.tel , f.adresse , f.linkedin ,f.fonction ,f.descri 
                            FROM App\Entity\Freelance f , 
                            App\Entity\Freelancepostule fp 
                            
                            WHERE f.idf= :idf and fp.idf= :idf And fp.idp= :idp
                            
                             ')->setParameter('idf', $idf)
                               ->setParameter('idp', $idp);
                         return $query->getResult();
      
    }

    public function GetF()
    {
        $entityManager =$this->getEntityManager();
        $query = $entityManager->createQuery(
                    'SELECT f.rate/count(DISTINCT( m.idp)) as score , count(DISTINCT( m.idp)) as nbrprojet , f.idf ,f.nom, f.prenom,  f.rate , f.adresse
                    FROM App\Entity\Freelancepostule m , App\Entity\Freelance f 
                    WHERE m.idf = f.idf AND m.etat = 1
                    Group By f.idf
                    Order by score ASC '
                    );
        return $query->getResult();
    }
  
}
