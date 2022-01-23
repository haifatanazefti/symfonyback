<?php

namespace App\Controller;

use App\Entity\Freelancepostule;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;


class PostulerController extends AbstractController
{
    /**
     * @Route("/postuler", name="postuler")
     */
    public function index(): Response
    {
        return $this->render('postuler/index.html.twig');
    }

     /**
     * @Route("/api/addPostule", name="addPostule" , methods={"POST","GET"})
     
     */
    public function addPostule(Request $req, SerializerInterface $srealizer , EntityManagerInterface $em)
    {
      
       $jsonRecu = $req->getContent();

       $demande =  $srealizer->deserialize($jsonRecu , Freelancepostule::class, 'json' );
   //$projet->setCreatedAt( new \DateTime());
       $em->persist($demande);
       $em->flush();
       $response = new Response();
       $response->headers->set('Content-Type', 'application/json');
       $response->headers->set('Access-Control-Allow-Origin', '*');

       $response->setContent(json_encode($demande));
       
       return $response;
                  
                   
                 
     
     
    }

    /**
     * @Route("/api/getPostule", name="getPostule" , methods={"GET"})
     
     */
    public function getPostule(Request $req)
    {
      
        $idp = $req->get('idp');


        $p = $this->getDoctrine()->getRepository(Freelancepostule::class)->getFpostules($idp);
       $response = new Response();
       $response->headers->set('Content-Type', 'application/json');
       $response->headers->set('Access-Control-Allow-Origin', '*');

       $response->setContent(json_encode($p));
       
       return $response;
                  
                   
                 
     
     
    }

      /**
        * @Route("/api/accept", name="accept" , methods={"GET"})
        */ 
        public function accept(Request $req , SerializerInterface $srealizer) {
            $max=1;
           
            $idf = $req->get('idf');
            $idp = $req->get('idp');
            $nb = $this->getDoctrine()->getRepository(Freelancepostule::class)->count($idp);
            $count = $nb[0]['nbr'];
            $response = new Response();
    
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            if($count < $max) {
            $fr = $this->getDoctrine()->getRepository(Freelancepostule::class)->accept($idf,$idp);
           
          
               
                       $response->setContent(json_encode($fr));
                       
                       return $response; }
                       else {
                        $response->setContent(0);
                       
                        return $response; 
                       }
           
        }

          /**
        * @Route("/api/refuse", name="refuse" , methods={"DELETE"})
        */ 
        public function refuse(Request $req) {
            $idf = $req->get('idf');
            $idp = $req->get('idp');
            $fr = $this->getDoctrine()->getRepository(Freelancepostule::class)->refuse($idf,$idp);
           
           $response = new Response();
    
                       $response->headers->set('Content-Type', 'application/json');
                       $response->headers->set('Access-Control-Allow-Origin', '*');
               
                       $response->setContent(json_encode($fr));
                       
                       return $response;
           
        }

         /**
        * @Route("/api/getequipe", name="equipe" , methods={"GET"})
        */ 
        public function getEquipe(Request $req) {
            $idp = $req->get('idp');
            
            $fr = $this->getDoctrine()->getRepository(Freelancepostule::class)->getEquipe($idp);
           
           $response = new Response();
    
                       $response->headers->set('Content-Type', 'application/json');
                       $response->headers->set('Access-Control-Allow-Origin', '*');
               
                       $response->setContent(json_encode($fr));
                       
                       return $response;
           
        }
          /**
        * @Route("/api/nomP", name="nomp" , methods={"GET"})
        */ 
        public function getNom(Request $req) {
            $idp = $req->get('idp');
            
            $fr = $this->getDoctrine()->getRepository(Freelancepostule::class)->getnom($idp);
           
           $response = new Response();
    
                       $response->headers->set('Content-Type', 'application/json');
                       $response->headers->set('Access-Control-Allow-Origin', '*');
               
                       $response->setContent($fr[0]['nomp']);
                       
                       return $response;
           
        }

           /**
        * @Route("/api/chef", name="ch" , methods={"GET"})
        */ 
        public function chef(Request $req) {
            $idf = $req->get('idf');
            $idp = $req->get('idp');
            $fr = $this->getDoctrine()->getRepository(Freelancepostule::class)->chef($idf,$idp);
           
           $response = new Response();
    
                       $response->headers->set('Content-Type', 'application/json');
                       $response->headers->set('Access-Control-Allow-Origin', '*');
               
                       $response->setContent(json_encode($fr));
                       
                       return $response;
           
        }

         /**
        * @Route("/api/annuler", name="chef" , methods={"GET"})
        */ 
        public function annuler(Request $req) {
            $idf = $req->get('idf');
            $idp = $req->get('idp');
            $fr = $this->getDoctrine()->getRepository(Freelancepostule::class)->annuler($idf,$idp);
           
           $response = new Response();
    
                       $response->headers->set('Content-Type', 'application/json');
                       $response->headers->set('Access-Control-Allow-Origin', '*');
               
                       $response->setContent(json_encode($fr));
                       
                       return $response;
           
        }
        
        
}
