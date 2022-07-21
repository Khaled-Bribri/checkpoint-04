<?php

namespace App\Entity;

use App\Repository\CamionTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CamionTypeRepository::class)]
class CamionType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'camionType', targetEntity: Camion::class)]
    private Collection $camion;

    public function __construct()
    {
        $this->camion = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Camion>
     */
    public function getCamion(): Collection
    {
        return $this->camion;
    }

    public function addCamion(Camion $camion): self
    {
        if (!$this->camion->contains($camion)) {
            $this->camion[] = $camion;
            $camion->setCamionType($this);
        }

        return $this;
    }

    public function removeCamion(Camion $camion): self
    {
        if ($this->camion->removeElement($camion)) {
            // set the owning side to null (unless already changed)
            if ($camion->getCamionType() === $this) {
                $camion->setCamionType(null);
            }
        }

        return $this;
    }
}
