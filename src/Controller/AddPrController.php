<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Projet;
use App\Repository\ProjetRepository;

class AddPrController extends AbstractController
{
    /**
     * @Route("/add/pr", name="add_pr")
     */
    public function index(): Response
    {
$projet=new Projet();
$projet->setNom("P1");
$projet->setSecteur("Secteur 1");
$projet->setlieu("Sousse");
$entityManager=$this->getDoctrine()->getManager();
$entityManager->persist($projet);
$entityManager->flush();
        return $this->render('add_pr/index.html.twig', [
            'controller_name' => 'AddPrController',
        ]);
    }
     /**
     * @Route("/getValues", name="get_pr")
     */
    public function getValues():Response
    {
$rep=$this->getDoctrine()->getRepository(Projet::class);
$p=$rep->find(10);
        return $this->render('add_pr/index.html.twig', [
            'controller_name' => $p->getNom(),
        ]);
    }
}
