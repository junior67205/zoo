<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\RaceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaceRepository::class)]
class Race
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomRace = null;

    #[ORM\OneToMany(mappedBy: 'animauxRace', targetEntity: Animaux::class)]
    private Collection $animaux;

    public function __construct()
    {
        $this->animaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nomRace;
    }

    public function setNom(string $nomRace): static
    {
        $this->nomRace = $nomRace;

        return $this;
    }

    /**
     * @return Collection<int, Animaux>
     */
    public function getAnimaux(): Collection
    {
        return $this->animaux;
    }

    public function addAnimaux(Animaux $animaux): static
    {
        if (!$this->animaux->contains($animaux)) {
            $this->animaux->add($animaux);
            $animaux->setAnimauxRace($this);
        }

        return $this;
    }

    public function removeAnimaux(Animaux $animaux): static
    {
        if ($this->animaux->removeElement($animaux)) {
            // set the owning side to null (unless already changed)
            if ($animaux->getAnimauxRace() === $this) {
                $animaux->setAnimauxRace(null);
            }
        }

        return $this;
    }
}
