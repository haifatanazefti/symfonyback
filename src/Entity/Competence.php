<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
/**
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 */
class Competence implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idc;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomc;

    public function getIdc(): ?int
    {
        return $this->id;
    }

    public function getNomc(): ?string
    {
        return $this->nomc;
    }

    public function setNomc(string $nomc): self
    {
        $this->nomc = $nomc;

        return $this;
    }
    public function jsonSerialize()
    {
        return array(
            'idc' => $this->idc,
            'nomc' => $this->nomc,
           
            
        );
    }
}
