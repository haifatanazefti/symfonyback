<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idprojet;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $nom;

     /**
     * @ORM\Column(type="string", length=50)
     */
    private $export;
     /**
     * @ORM\Column(type="string", length=10000)
     */
    
    private $descri;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lieu;

    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prix;

 
    /**
    * @ORM\Column(type="integer") 
    */
    private $societe;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $duree;
    public function getIdProjet()
    {
        return $this->idprojet;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getExport()
    {
        return $this->export;
    }

    public function setExport(string  $export)
    {
        $this->export = $export;

        return $this;
    }
   
    public function getDescri()
    {
        return $this->descri;
    }


    public function setDescri(string $descri)
    {
        $this->descri = $descri;

        return $this;
    }
   

    public function getLieu()
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix(String $prix)
    {
        $this->prix = $prix;

        return $this;
    }
   
    public function getSociete()
    {
        return $this->societe;
    }
    public function setSociete(int $societe)
    {
        $this->societe = $societe;

        return $this;
    }
    public function getDuree()
    {
        return $this->debut;
    }

    public function setDuree(string $duree)
    {
        $this->duree = $duree;

        return $this;
    }
    public function jsonSerialize()
    {
        return array(
            'idprojet' => $this->idprojet,
            'nom' => $this->nom,
           
             'export' => $this->export,
            
             'descri' => $this->descri,
            
            'lieu'=> $this->lieu,
            'prix'=> $this->prix,
            
            'societe'=> $this->societe,
            'duree' => $this->duree,
           
        );
    }
}
