<?php

namespace App\Entity;

use App\Repository\RealisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RealisateurRepository::class)
 */
class Realisateur
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
     * @ORM\Column(type="string", length=40, nullable=false)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private  $ville;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codepostale;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $pays;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Disque", mappedBy="realisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $disques;

    public function __construct()
    {
        $this->disques = new ArrayCollection();
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getCodepostale()
    {
        return $this->codepostale;
    }

    /**
     * @param mixed $codepostale
     */
    public function setCodepostale($codepostale): void
    {
        $this->codepostale = $codepostale;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays): void
    {
        $this->pays = $pays;
    }



    public function getId(): ?int
    {
        return $this->id;
    }
}
