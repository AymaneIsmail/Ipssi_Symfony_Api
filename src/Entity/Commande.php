<?php

namespace App\Entity;

use ApiPlatform\Elasticsearch\Tests\Fixtures\User;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use DateTimeImmutable;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
#[ApiResource(
    normalizationContext: [
        'groups' => ['commande:read']
    ],
    denormalizationContext: [
        'groups' => ['commande:write']
    ],
)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['commande:read', 'utilisateur:read'])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(['commande:read'])]
    private ?DateTimeImmutable $dateCommande = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[Groups(['commande:read', 'commande:write'])]
    private ?Utilisateur $utilisateur = null;
    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: DetailCommande::class, cascade: ['persist', 'remove'])]
    #[Groups(['commande:read', 'utilisateur:read'])]
    private Collection $detailCommandes;

    #[Groups(['commande:read', 'utilisateur:read'])]
    private $userCommande = [];

    public function __construct()
    {

        $this->dateCommande = new DateTimeImmutable();
        $this->detailCommandes = new ArrayCollection();

    }

    public function getUserCommande(): array
    {
        return $this->commandeRepository->executeProcedure(1);
    }

    public function setUserCommande(array $userCommande): void
    {
        $this->userCommande = $userCommande;
    }

    public function getDateCommande(): ?DateTimeImmutable
    {
        return $this->dateCommande;
    }

    public function setDateCommande(?DateTimeImmutable $dateCommande): void
    {
        $this->dateCommande = $dateCommande;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection<int, DetailCommande>
     */
    public function getDetailCommandes(): Collection
    {
        return $this->detailCommandes;
    }

    public function addDetailCommande(DetailCommande $detailCommande): static
    {
        if (!$this->detailCommandes->contains($detailCommande)) {
            $this->detailCommandes->add($detailCommande);
            $detailCommande->setCommande($this);
        }

        return $this;
    }

    public function removeDetailCommande(DetailCommande $detailCommande): static
    {
        if ($this->detailCommandes->removeElement($detailCommande)) {
            // set the owning side to null (unless already changed)
            if ($detailCommande->getCommande() === $this) {
                $detailCommande->setCommande(null);
            }
        }

        return $this;
    }
}
