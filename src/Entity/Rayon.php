<?php

namespace App\Entity;

use App\Repository\RayonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RayonRepository::class)
 */
class Rayon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $typeDisque;

    /**
     * @ORM\Column(type="integer")
     */
    private $anneeSortie;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Disque", mappedBy="rayon")
     * @ORM\JoinColumn(nullable=false)
     */
    private $disques;

    public function __construct()
    {
        $this->disques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTypeDisque()
    {
        return $this->typeDisque;
    }

    /**
     * @param mixed $typeDisque
     */
    public function setTypeDisque($typeDisque): void
    {
        $this->typeDisque = $typeDisque;
    }

    /**
     * @return mixed
     */
    public function getAnneeSortie()
    {
        return $this->anneeSortie;
    }

    /**
     * @param mixed $anneeSortie
     */
    public function setAnneeSortie($anneeSortie): void
    {
        $this->anneeSortie = $anneeSortie;
    }

}
