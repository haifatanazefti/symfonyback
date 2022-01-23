<?php

namespace App\Controller;

use App\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;

class ProjetController extends AbstractController
{
    /**
     * @Route("/projet", name="projet")
     */
    public function index(): Response
    {
        return $this->render('projet/index.html.twig');
    }

    /**
     * @Route("/api/projets", name="projet" , methods={"GET"})
     
     */
    public function getProjets()
    {
        $projets = $this->getDoctrine()->getRepository(Projet::class)->getProjets();
        //$json =  $srealizer->serialize($projets ,'json' );
       // return $this->json($projets);
        
       
        
                 /* $reponse = new Response($this->json($projets), 200, [
                  'content-type' => 'application/json'
                       ]);
                   return $reponse;*/
                   $response = new Response();

                   $response->headers->set('Content-Type', 'application/json');
                   $response->headers->set('Access-Control-Allow-Origin', '*');
           
                   $response->setContent(json_encode($projets));
                   
                   return $response;
     
    }
      /**
     * @Route("/api/addProjet", name="addProjet" , methods={"POST","GET"})
     
     */
    public function addProjet(Request $req , SerializerInterface $srealizer , EntityManagerInterface $em)
    {
     
       $jsonRecu = $req->getContent();

      $projet =  $srealizer->deserialize($jsonRecu , Projet::class, 'json' );
   //$projet->setCreatedAt( new \DateTime());
       $em->persist($projet);
       $em->flush();
       $response = new Response();
       $response->headers->set('Content-Type', 'application/json');
       $response->headers->set('Access-Control-Allow-Origin', '*');

       $response->setContent(json_encode($projet));
       
       return $response;
                  
                   
                 
     
     
    }

     /**
     * @Route("/api/Projet", name="Projet" , methods={"GET"})
     
     */
    public function getProjet(Request $req )
    {
        
        $idprojet = $req->get('idprojet');

       $p = $this->getDoctrine()->getRepository(Projet::class)->find($idprojet);
       $response = new Response();
       $response->headers->set('Content-Type', 'application/json');
       $response->headers->set('Access-Control-Allow-Origin', '*');

       $response->setContent(json_encode($p));
       
       return $response;
                  
                   
                 
     
     
    }
    /**
     * @Route("/api/Societe", name="societe" , methods={"GET"})
     
     */
    public function getSociete(Request $req )
    {
        
        $ids = $req->get('ids');

       $p = $this->getDoctrine()->getRepository(Projet::class)->getsocietes($ids);
       $response = new Response();
       $response->headers->set('Content-Type', 'application/json');
       $response->headers->set('Access-Control-Allow-Origin', '*');

       $response->setContent(json_encode($p));
       
       return $response;
                  
                   
                 
     
     
    }


}
