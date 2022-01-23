<?php

namespace App\Controller;

use App\Entity\Freelance;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FreelanceController extends AbstractController
{
    /**
     * @Route("/freelance", name="freelance")
     */
    public function index(): Response
    {
        return $this->render('freelance/index.html.twig');
    }
    /**
     * @Route("/api/freelance", name="fc" , methods={"GET"})
     
     */
    public function getFreelance (Request $req){
    $id = $req->get('idf');
    
    $freelance = $this->getDoctrine()->getRepository(Freelance::class)->getFreelance($id);
    $response = new Response();

    $response->headers->set('Content-Type', 'application/json');
    $response->headers->set('Access-Control-Allow-Origin', '*');

    $response->setContent(json_encode($freelance));
    
    return $response;
    }

    /**
     * @Route("/api/getfreelance", name="f" , methods={"GET"})
     
     */
    public function getF (Request $req){
        $id = $req->get('idf');
        $idp = $req->get('idp');
        
        $freelance = $this->getDoctrine()->getRepository(Freelance::class)->findF($id,$idp);
        $response = new Response();
    
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
    
        $response->setContent(json_encode($freelance));
        
        return $response;
        }


         /**
     * @Route("/api/top", name="freelance" , methods={"GET"})
     
     */
    public function getTop (Request $req){
       
        
        $freelance = $this->getDoctrine()->getRepository(Freelance::class)->GetF();
        $response = new Response();
    
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
    
        $response->setContent(json_encode($freelance));
        
        return $response;
        }
}
