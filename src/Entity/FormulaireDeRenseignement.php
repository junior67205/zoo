<?php

namespace App\Entity;

use App\Repository\FormulaireDeRenseignementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormulaireDeRenseignementRepository::class)]
class FormulaireDeRenseignement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    /**
     * @Assert\Regex(
     *     pattern="/^[^&<>\"']*$/",
     *     match=true,
     *     message="Le nom ne doit pas contenir de caractères spéciaux."
     * )
     */
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    /**
     * @Assert\Regex(
     *     pattern="/^[^&<>\"']*$/",
     *     match=true,
     *     message="Le prenom ne doit pas contenir de caractères spéciaux."
     * )
     */
    private ?string $prenom = null;

    #[ORM\Column(length: 10)]
    /**
     * @Assert\Regex(
     *     pattern="/^[^&<>\"']*$/",
     *     match=true,
     *     message="Le telephone ne doit pas contenir de caractères spéciaux."
     * )
     */
    private ?string $telephone = null;

    #[ORM\Column(length: 180)]
    /**
     * @Assert\Regex(
     *     pattern="/^[^&<>\"']*$/",
     *     match=true,
     *     message="L email ne doit pas contenir de caractères spéciaux."
     * )
     */
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    /**
     * @Assert\Regex(
     *     pattern="/^[^&<>\"']*$/",
     *     match=true,
     *     message="Le sujet ne doit pas contenir de caractères spéciaux."
     * )
     */
    private ?string $sujet = null;

    #[ORM\Column(type: Types::TEXT)]
    /**
     * @Assert\Regex(
     *     pattern="/^[^&<>\"']*$/",
     *     match=true,
     *     message="Le message ne doit pas contenir de caractères spéciaux."
     * )
     */
    private ?string $message = null;

    #[ORM\Column(length: 255)]
    private ?string $valide = null;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): static
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getValide(): ?string
    {
        return $this->valide;
    }

    public function setValide(string $valide): static
    {
        $this->valide = $valide;

        return $this;
    }
}
