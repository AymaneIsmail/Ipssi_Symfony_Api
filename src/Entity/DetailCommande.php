<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DetailCommandeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DetailCommandeRepository::class)]
#[ApiResource(
    normalizationContext: [
        'groups' => ['commandeDetail:read']
    ],
    denormalizationContext: [
        'groups' => ['commandeDetail:write']
    ]
)]
class DetailCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['commandeDetail:read','utilisateur:read', 'commande:read'])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(['commandeDetail:read','commandeDetail:write','utilisateur:read', 'commande:read', 'produit:readdb'])]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'detailCommandes')]
    #[Groups(['commandeDetail:read','commandeDetail:write','utilisateur:read', 'commande:read', 'produit:read'])]
    private ?Produit $produit = null;

    #[ORM\ManyToOne(inversedBy: 'detailCommandes')]
    #[Groups(['commandeDetail:read','commandeDetail:write','commande:read'])]
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
