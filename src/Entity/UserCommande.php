<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
)]
class UserCommande
{

    #[ORM\Column(length: 255)]
    private ?string $nom = null;
    #[ORM\Column(length: 255)]
    private ?string $prenom = null;
    #[ORM\Column]
    private ?int $quantite = null;
    #[ORM\Column(length: 255)]
    private ?string $nomProduit = null;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): void
    {
        $this->quantite = $quantite;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(?string $nomProduit): void
    {
        $this->nomProduit = $nomProduit;
    }


}