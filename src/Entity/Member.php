<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemberRepository::class)]
class Member extends User
{
    //#[ORM\Id]
    //#[ORM\GeneratedValue]
    //#[ORM\Column]
    //private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $registration_date;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $biography = null;

    #[ORM\Column]
    private ?bool $validated = false;

    #[ORM\Column]
    private ?int $reputation = 0;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function __construct()
    {
        $this->registration_date = new \DateTime(); // Définir la date d'inscription comme la date actuelle lors de la création de l'objet
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registration_date;
    }

    public function setRegistrationDate(\DateTimeInterface $registration_date): static
    {
        $this->registration_date = $registration_date;
        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): static
    {
        $this->biography = $biography;

        return $this;
    }

    public function isValidated(): ?bool
    {
        return $this->validated;
    }

    public function setValidated(bool $validated): static
    {
        $this->validated = $validated;

        return $this;
    }

    public function getReputation(): ?int
    {
        return $this->reputation;
    }

    public function setReputation(int $reputation): static
    {
        $this->reputation = $reputation;

        return $this;
    }
}
