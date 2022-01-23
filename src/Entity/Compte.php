<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idcompte;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $password;
 /**
     * @ORM\Column(type="string", length=25)
     */
    private $privilege;

    /**
     * @ORM\Column(type="integer")
     */
    private $idf;

    /**
     * @ORM\Column(type="integer")
     */
    private $idsoc;

    public function getIdCompte(): ?int
    {
        return $this->idcompte;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password= $password;

        return $this;
    }

    public function getPrivilege(): ?string
    {
        return $this->privilege;
    }

    public function setPrivilege(string $Privilege): self
    {
        $this->privilege= $Privilege;

        return $this;
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

    public function getIdsoc(): ?int
    {
        return $this->idsoc;
    }

    public function setIdsoc(int $idsoc): self
    {
        $this->idsoc = $idsoc;

        return $this;
    }

    public function jsonSerialize()
    {
        return array(
            'idcompte' => $this->idcompte,
            'login' => $this->login,
           
             'password' => $this->password,
            
             'privilege' => $this->privilege,
            
            'idf'=> $this->idf,
            'idsoc'=> $this->idsoc
            
         
           
        );
    }
}
