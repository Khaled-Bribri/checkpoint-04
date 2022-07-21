<?php

namespace App\Entity;

use App\Repository\CamionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CamionRepository::class)]
class Camion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $KM = null;

    #[ORM\ManyToOne(inversedBy: 'camion')]
    private ?CamionType $camionType = null;

    #[ORM\OneToMany(mappedBy: 'camion', targetEntity: Commande::class)]
    private Collection $commandes;

    #[ORM\OneToMany(mappedBy: 'camion', targetEntity: Intervention::class)]
    private Collection $interventions;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->interventions = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getKM(): ?int
    {
        return $this->KM;
    }

    public function setKM(int $KM): self
    {
        $this->KM = $KM;

        return $this;
    }

    public function getCamionType(): ?CamionType
    {
        return $this->camionType;
    }

    public function setCamionType(?CamionType $camionType): self
    {
        $this->camionType = $camionType;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setCamion($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getCamion() === $this) {
                $commande->setCamion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Intervention>
     */
    public function getInterventions(): Collection
    {
        return $this->interventions;
    }

    public function addIntervention(Intervention $intervention): self
    {
        if (!$this->interventions->contains($intervention)) {
            $this->interventions[] = $intervention;
            $intervention->setCamion($this);
        }

        return $this;
    }

    public function removeIntervention(Intervention $intervention): self
    {
        if ($this->interventions->removeElement($intervention)) {
            // set the owning side to null (unless already changed)
            if ($intervention->getCamion() === $this) {
                $intervention->setCamion(null);
            }
        }

        return $this;
    }

   
}
