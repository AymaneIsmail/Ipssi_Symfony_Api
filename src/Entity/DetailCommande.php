<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DetailCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailCommandeRepository::class)]
#[ApiResource]
class DetailCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['utilisateur:read', 'commande:read'])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(['utilisateur:read', 'commande:read'])]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'detailCommandes')]
    #[Groups(['utilisateur:read', 'commande:read'])]
    private ?Produit $produit = null;

    #[ORM\ManyToOne(inversedBy: 'detailCommandes')]
    #[Groups(['commande:read'])]
    private ?Commande $commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): static
    {
        $this->produit = $produit;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): static
    {
        $this->commande = $commande;

        return $this;
    }
}
