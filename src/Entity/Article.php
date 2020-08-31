<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Photo;

    /**
     * @return mixed
     */


    /**
     * @ORM\Column(type="text")
     */
    private $Champ;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getPhoto()
    {
        return $this->Photo;
    }

    /**
     * @param mixed $Photo
     */
    public function setPhoto($Photo): void
    {
        $this->Photo = $Photo;
    }

    public function getChamp(): ?string
    {
        return $this->Champ;
    }

    public function setChamp(string $Champ): self
    {
        $this->Champ = $Champ;

        return $this;
    }
}
