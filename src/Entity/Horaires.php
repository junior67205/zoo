<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $Jours = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $horairesOuverturesMatin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $horairesFermeturesSoir = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJours(): ?string
    {
        return $this->Jours;
    }

    public function setJours(string $Jours): static
    {
        $this->Jours = $Jours;

        return $this;
    }

    public function getHorairesOuverturesMatin(): ?\DateTimeInterface
    {
        return $this->horairesOuverturesMatin;
    }

    public function setHorairesOuverturesMatin(\DateTimeInterface $horairesOuverturesMatin): static
    {
        $this->horairesOuverturesMatin = $horairesOuverturesMatin;

        return $this;
    }

    public function getHorairesFermeturesSoir(): ?\DateTimeInterface
    {
        return $this->horairesFermeturesSoir;
    }

    public function setHorairesFermeturesSoir(\DateTimeInterface $horairesFermeturesSoir): static
    {
        $this->horairesFermeturesSoir = $horairesFermeturesSoir;

        return $this;
    }
}
