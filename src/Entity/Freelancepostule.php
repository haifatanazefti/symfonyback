<?php

namespace App\Entity;

use App\Repository\FreelancepostuleRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
/**
 * @ORM\Entity(repositoryClass=FreelancepostuleRepository::class)
 */
class Freelancepostule implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idfp;

    /**
     * @ORM\Column(type="integer")
     */
    private $idf;

    /**
     * @ORM\Column(type="integer")
     */
    private $idp;

    /**
     * @ORM\Column(type="integer")
     */
    private $etat;

    /**
     * @ORM\Column(type="integer")
     */
    private $role;

     /**
     * @ORM\Column(type="string" ,length=20 )
     */
    private $date;

    public function getIdfp(): ?int
    {
        return $this->id;
    }

    public function getIdf(): ?int
    {
        return $this->idf;
    }

    public function setIdf(int $idf): self
    {
        $this->idf = $idf;

        return $this;
    }

    public function getIdp(): ?int
    {
        return $this->idp;
    }

    public function setIdp(int $idp): self
    {
        $this->idp = $idp;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getRole(): ?int
    {
        return $this->role;
    }

    public function setRole(int $role): self
    {
        $this->role = $role;

        return $this;
    }
   

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $d): self
    {
        $this->date= $d;

        return $this;
    }
    public function jsonSerialize()
    {
        return array(
            'idfp' => $this->idfp,
            'idf' => $this->idf,
            'idp' => $this->idp,
            'etat' => $this ->etat,
            'role' => $this->role ,
           
            'date' => $this->date
           
            
        );
    }
}
