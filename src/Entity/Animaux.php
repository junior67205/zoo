<?php

namespace App\Entity;

use App\Repository\AnimauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimauxRepository::class)]
class Animaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\OneToOne(mappedBy: 'habitatsAnimaux', cascade: ['persist', 'remove'])]
    private ?Habitats $habitats = null;

    #[ORM\OneToMany(mappedBy: 'animaux', targetEntity: Images::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $animauxImages;

    #[ORM\ManyToOne(inversedBy: 'animaux')]
    private ?Race $animauxRace = null;

    public function __construct()
    {
        $this->animauxImages = new ArrayCollection();
        $this->animauxRace = null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getHabitats(): ?Habitats
    {
        return $this->habitats;
    }

    public function setHabitats(Habitats $habitats): static
    {
        // set the owning side of the relation if necessary
        if ($habitats->getHabitatsAnimaux() !== $this) {
            $habitats->setHabitatsAnimaux($this);
        }

        $this->habitats = $habitats;

        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getAnimauxImages(): Collection
    {
        return $this->animauxImages;
    }

    public function addAnimauxImage(Images $animauxImage): static
    {
        if (!$this->animauxImages->contains($animauxImage)) {
            $this->animauxImages->add($animauxImage);
            $animauxImage->setAnimaux($this);
        }

        return $this;
    }

    public function removeAnimauxImage(Images $animauxImage): static
    {
        if ($this->animauxImages->removeElement($animauxImage)) {
            // set the owning side to null (unless already changed)
            if ($animauxImage->getAnimaux() === $this) {
                $animauxImage->setAnimaux(null);
            }
        }

        return $this;
    }

    public function getAnimauxRace(): ?Race
    {
        return $this->animauxRace;
    }

    public function setAnimauxRace(?Race $animauxRace): static
    {
        $this->animauxRace = $animauxRace;

        return $this;
    }
}
