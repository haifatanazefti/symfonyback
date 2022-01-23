<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag  implements JsonSerializable
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idf;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $tag;
    /**
     * @ORM\Column(type="integer")
     */
    private $nb;

    public function getId()
    {
        return $this->id;
    }

    public function getIdf()
    {
        return $this->idf;
    }

    public function setIdf(int $idf)
    {
        $this->idf = $idf;

        return $this;
    }

    public function getTag()
    {
        return $this->tag;
    }

    public function setTag(string $tag)
    {
        $this->tag = $tag;

        return $this;
    }
    public function getNb()
    {
        return $this->nb;
    }

    public function setNb(int $nb)
    {
        $this->nb = $nb;

        return $this;
    }
    public function jsonSerialize()
    {
        return array(
            'id' => $this->id,
            'idf' => $this->idf,
            'tag' => $this->tag,
            'nb' => $this->nb,
           
            
        );
    }
}
