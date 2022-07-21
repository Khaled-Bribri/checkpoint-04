<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $commandeDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $commandeFin = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\ManyToMany(targetEntity: Service::class, inversedBy: 'commandes')]
    private Collection $service;

  

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'commande')]
    private Collection $users;

    #[ORM\ManyToOne(inversedBy: 'commande')]
    private ?ReclamationClient $reclamationClient = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Camion $camion = null;

    public function __construct()
    {
        $this->service = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommandeDebut(): ?\DateTimeInterface
    {
        return $this->commandeDebut;
    }

    public function setCommandeDebut(\DateTimeInterface $commandeDebut): self
    {
        $this->commandeDebut = $commandeDebut;

        return $this;
    }

    public function getCommandeFin(): ?\DateTimeInterface
    {
        return $this->commandeFin;
    }

    public function setCommandeFin(\DateTimeInterface $commandeFin): self
    {
        $this->commandeFin = $commandeFin;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getService(): Collection
    {
        return $this->service;
    }

    public function addService(Service $service): self
    {
        if (!$this->service->contains($service)) {
            $this->service[] = $service;
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        $this->service->removeElement($service);

        return $this;
    }






    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addCommande($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeCommande($this);
        }

        return $this;
    }

    public function getReclamationClient(): ?ReclamationClient
    {
        return $this->reclamationClient;
    }

    public function setReclamationClient(?ReclamationClient $reclamationClient): self
    {
        $this->reclamationClient = $reclamationClient;

        return $this;
    }

    public function getCamion(): ?Camion
    {
        return $this->camion;
    }

    public function setCamion(?Camion $camion): self
    {
        $this->camion = $camion;

        return $this;
    }
}
