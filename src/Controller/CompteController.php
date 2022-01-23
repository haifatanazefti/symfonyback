<?php

namespace App\Controller;
use App\Entity\Compte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;

class CompteController extends AbstractController
{
    /**
     * @Route("/compte", name="compte")
     */
    public function index(): Response
    {
        return $this->render('compte/index.html.twig');
    }

/**
     * @Route("/api/login", name="c")
     */
    public function compte(Request $req) {
        $login = $req->get('login');
        $password = $req->get('password');
        $fr = $this->getDoctrine()->getRepository(Compte::class)->GetPrivilege($login,$password);
        if (!$fr){
            return new Response("noooo compteeeee  !!! ");
        }
        else {
       $response = new Response();

                   $response->headers->set('Content-Type', 'application/json');
                   $response->headers->set('Access-Control-Allow-Origin', '*');
           
                   $response->setContent(json_encode($fr));
                   
                   return $response;
        }

}
}