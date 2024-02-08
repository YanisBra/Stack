<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Question::class, mappedBy: 'question_tag')]
    private Collection $questions;

    #[ORM\ManyToMany(targetEntity: Moderator::class, mappedBy: 'moderator_tag')]
    private Collection $moderators;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->moderators = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Question>
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): static
    {
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
            $question->addQuestionTag($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): static
    {
        if ($this->questions->removeElement($question)) {
            $question->removeQuestionTag($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Moderator>
     */
    public function getModerators(): Collection
    {
        return $this->moderators;
    }

    public function addModerator(Moderator $moderator): static
    {
        if (!$this->moderators->contains($moderator)) {
            $this->moderators->add($moderator);
            $moderator->addModeratorTag($this);
        }

        return $this;
    }

    public function removeModerator(Moderator $moderator): static
    {
        if ($this->moderators->removeElement($moderator)) {
            $moderator->removeModeratorTag($this);
        }

        return $this;
    }
}
