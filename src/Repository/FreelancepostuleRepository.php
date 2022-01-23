<?php

namespace App\Repository;

use App\Entity\Freelancepostule;
use App\Entity\Freelance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Freelancepostule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Freelancepostule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Freelancepostule[]    findAll()
 * @method Freelancepostule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FreelancepostuleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Freelancepostule::class);
    }

    // /**
    //  * @return Freelancepostule[] Returns an array of Freelancepostule objects
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
    public function findOneBySomeField($value): ?Freelancepostule
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function count($id)
    {   $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
                            'SELECT count(fp.idf) as nbr
                             FROM 
                             App\Entity\Freelancepostule fp
                              WHERE fp.idp = :id AND fp.etat = 1
                           
                           
                            
                            ')->setParameter('id', $id);
                         return $query->getResult();
      
    }
    public function getFpostules($id)
{   $entityManager = $this->getEntityManager();
    $query = $entityManager->createQuery(
                        'SELECT DISTINCT fp.idp ,f.idf , f.nom , f.prenom ,f.datenaiss, f.tel , f.adresse , f.linkedin ,f.fonction , fp.date , f.descri
                         FROM App\Entity\Freelance f , 
                         App\Entity\Freelancepostule fp
                          WHERE fp.idp = :id AND fp.idf=f.idf and fp.etat <> 1
                       
                       
                        
                        ')->setParameter('id', $id);
                     return $query->getResult();
  
}
public function accept($idf,$idp)
{
    $entityManager =$this->getEntityManager();
    $query = $entityManager->createQuery(
                'UPDATE App\Entity\FreelancePostule m 
                 SET m.etat=1
                WHERE m.idf = :idf and m.idp = :idp
                '
                )->setParameter('idf', $idf)
                ->setParameter('idp', $idp);
    return $query->getResult();
    
}

public function refuse($idf,$idp)
{
    $entityManager =$this->getEntityManager();
    $query = $entityManager->createQuery(
                'DELETE FROM  App\Entity\FreelancePostule m 
                WHERE m.idf = :idf and m.idp = :idp
                '
                )->setParameter('idf', $idf)
                ->setParameter('idp', $idp);
    return $query->getResult();
    
}

public function getEquipe($idp)
    {
        $entityManager =$this->getEntityManager();
        $query = $entityManager->createQuery(
                    'SELECT  f.idf , f.nom , f.prenom , f.fonction ,  m.idp , m.role
                    FROM App\Entity\FreelancePostule m , App\Entity\Freelance f 
                    WHERE m.idp= :idp AND m.idf = f.idf AND m.etat=1 
                   
                    '
                    )->setParameter('idp', $idp);
        return $query->getResult();
        
    }

    public function getnom($idp)
    {
        $entityManager =$this->getEntityManager();
        $query = $entityManager->createQuery(
                    'SELECT   p.nom as nomp 
                    FROM  App\Entity\Projet p
                    WHERE  p.idprojet = :idp
                   
                    '
                    )->setParameter('idp', $idp);
        return $query->getResult();
        
    }

    public function chef($idf, $idp)
    {
        $entityManager =$this->getEntityManager();
        $query = $entityManager->createQuery(
                'UPDATE App\Entity\FreelancePostule m 
                SET m.role = 1
                WHERE m.idf = :idf AND m.idp = :idp
                '
                )->setParameter('idf', $idf)
                ->setParameter('idp', $idp);
         return $query->getResult();
        
    }
    public function annuler($idf, $idp)
    {
        $entityManager =$this->getEntityManager();
        $query = $entityManager->createQuery(
                'UPDATE App\Entity\FreelancePostule m 
                SET m.etat = 0
                WHERE m.idf = :idf AND m.idp = :idp
                '
                )->setParameter('idf', $idf)
                ->setParameter('idp', $idp);
         return $query->getResult();
        
    }
}
