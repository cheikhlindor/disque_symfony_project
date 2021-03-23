<?php

namespace App\Entity;

use App\Repository\DisqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DisqueRepository::class)
 */
class Disque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40, nullable=false)
     */
    private $nom;


    /**
     * @ORM\Column(type="integer")
     */
    private $nombbreTitres;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $editeur;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Realisateur", inversedBy="disques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $realisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rayon", inversedBy="disques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rayon;

    /**
     * @return mixed
     */
    public function getEditeur()
    {
        return $this->editeur;
    }

    /**
     * @param mixed $editeur
     */
    public function setEditeur($editeur): void
    {
        $this->editeur = $editeur;
    }

    /**
     * @return mixed
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * @param mixed $realisateur
     */
    public function setRealisateur($realisateur): void
    {
        $this->realisateur = $realisateur;
    }

    /**
     * @return mixed
     */
    public function getRayon()
    {
        return $this->rayon;
    }

    /**
     * @param mixed $rayon
     */
    public function setRayon($rayon): void
    {
        $this->rayon = $rayon;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getNombbreTitres()
    {
        return $this->nombbreTitres;
    }

    /**
     * @param mixed $nombbreTitres
     */
    public function setNombbreTitres($nombbreTitres): void
    {
        $this->nombbreTitres = $nombbreTitres;
    }

    /**
     * @return mixed
     */
    public function getDateSorties()
    {
        return $this->dateSorties;
    }

    /**
     * @param mixed $dateSorties
     */
    public function setDateSorties($dateSorties): void
    {
        $this->dateSorties = $dateSorties;
    }


    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private  $dateSorties;

    public function getId(): ?int
    {
        return $this->id;
    }
}
