<?php

namespace App\Entity;

use App\Repository\FreelanceRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
/**
 * @ORM\Entity(repositoryClass=FreelanceRepository::class)
 */
class Freelance implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idf;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $datenaiss;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $linkedin;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     */
    private $rate;
    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $fonction;

     /**
     * @ORM\Column(type="string" , length=200)
     */
    private $descri;
    public function getIdf(): ?int
    {
        return $this->idf;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDatenaiss(): ?string
    {
        return $this->datenaiss;
    }

    public function setDatenaiss(string $datenaiss): self
    {
        $this->datenaiss = $datenaiss;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(int $rate): self
    {
        $this->rate = $rate;

        return $this;
    }
    public function getFonction(): ?string
    {
        return $this->focntion;
    }

    public function setFonction(string $f): self
    {
        $this->fonction = $f;

        return $this;
    }
    public function getDescri(): ?string
    {
        return $this->descri;
    }

    public function setDescri(string $d): self
    {
        $this->descri = $d;

        return $this;
    }
    public function jsonSerialize()
    {
        return array(
            'idf' => $this->idf,
            'nom' => $this->nom,
           
             'prenom' => $this->prenom,
            
             'datenaiss' => $this->datenaiss,
            
            'tel'=> $this->tel,
            'adresse'=> $this->adresse,
            
            'linkedin'=> $this->linkedin,
            'image' => $this->image,
            'rate' => $this->rate,
            'focntion' => $this->fonction,
            'descri' => $this->descri,
           
        );
    }
}
