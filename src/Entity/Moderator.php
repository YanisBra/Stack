<?php

namespace App\Entity;

use App\Repository\ModeratorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModeratorRepository::class)]
class Moderator extends User
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $domain = null;

    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'moderators')]
    private Collection $moderator_tag;

    public function __construct()
    {
        $this->moderator_tag = new ArrayCollection();
    }

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): static
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getModeratorTag(): Collection
    {
        return $this->moderator_tag;
    }

    public function addModeratorTag(Tag $moderatorTag): static
    {
        if (!$this->moderator_tag->contains($moderatorTag)) {
            $this->moderator_tag->add($moderatorTag);
        }

        return $this;
    }

    public function removeModeratorTag(Tag $moderatorTag): static
    {
        $this->moderator_tag->removeElement($moderatorTag);

        return $this;
    }
}

