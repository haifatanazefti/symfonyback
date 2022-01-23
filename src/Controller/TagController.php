<?php

namespace App\Controller;


use App\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;

class TagController extends AbstractController
{
    /**
     * @Route("/tag", name="tag")
     */
    public function index(): Response
    {
        return $this->render('tag/index.html.twig');
    }

     /**
     * @Route("/api/addTag", name="addTag" , methods={"POST","GET"})
     */
    public function addTag(Request $req , SerializerInterface $srealizer , EntityManagerInterface $em)
    {
        $response = new Response();
       $response->headers->set('Content-Type', 'application/json');
       $response->headers->set('Access-Control-Allow-Origin', '*');
       $jsonRecu = $req->getContent();
     
       $tag =  $srealizer->deserialize($jsonRecu , Tag::class, 'json' );
       $nom = $tag->getTag();
       $tags = $this->getDoctrine()->getRepository(Tag::class)->findN($nom);
      if ( empty($tags)) {
        $em->persist($tag);
        $em->flush();
        $response->setContent(json_encode($tags));
      
      } else {
        $setNuamber = $this->getDoctrine()->getRepository(Tag::class)->update($nom);
        $em->flush();
        $response->setContent("sucess update");
      }
   //$projet->setCreatedAt( new \DateTime());
      /* $em->persist($tag);
       $em->flush();*/
       

       
       
       return $response;
                  
                    }
    /**
     * @Route("/api/tags", name="tags" , methods={"GET"})
     
     */
    public function getTags (Request $req){
        $id = $req->get('idf');
        
        $response = new Response();
    
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $tags = $this->getDoctrine()->getRepository(Tag::class)->getTags($id);
        if($tags == null) {
            $response->setContent("vide");
        }
         else 
         {
            $response->setContent(json_encode($tags));
         }
    
       
        
        return $response;
        }

       
}
