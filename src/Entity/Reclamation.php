<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reclamation = null;

    #[ORM\OneToOne(mappedBy: 'reclamation', cascade: ['persist', 'remove'])]
    private ?ReclamationClient $reclamationClient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReclamation(): ?string
    {
        return $this->reclamation;
    }

    public function setReclamation(string $reclamation): self
    {
        $this->reclamation = $reclamation;

        return $this;
    }

    public function getReclamationClient(): ?ReclamationClient
    {
        return $this->reclamationClient;
    }

    public function setReclamationClient(?ReclamationClient $reclamationClient): self
    {
        // unset the owning side of the relation if necessary
        if ($reclamationClient === null && $this->reclamationClient !== null) {
            $this->reclamationClient->setReclamation(null);
        }

        // set the owning side of the relation if necessary
        if ($reclamationClient !== null && $reclamationClient->getReclamation() !== $this) {
            $reclamationClient->setReclamation($this);
        }

        $this->reclamationClient = $reclamationClient;

        return $this;
    }
}
