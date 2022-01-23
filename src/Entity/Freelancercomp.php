<?php

namespace App\Entity;

use App\Repository\FreelancercompRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass=FreelancercompRepository::class)
 */
class Freelancercomp  implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idFC;

    /**
     * @ORM\Column(type="integer")
     */
    private $idf;

    /**
     * @ORM\Column(type="integer")
     */
    private $idc;

    public function getIdFC(): ?int
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

    public function getIdc(): ?int
    {
        return $this->idc;
    }

    public function setIdc(int $idc): self
    {
        $this->idc = $idc;

        return $this;
    }
    public function jsonSerialize()
    {
        return array(
            'idFC' => $this->idFC,
            'idf' => $this->idf,
            'idc' => $this->idc,
           
            
        );
    }
}
