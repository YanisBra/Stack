<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $comment = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    private ?Member $author_id = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    private ?Question $question_subject_id = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    private ?Answer $answer_subject_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getAuthorId(): ?Member
    {
        return $this->author_id;
    }

    public function setAuthorId(?Member $author_id): static
    {
        $this->author_id = $author_id;

        return $this;
    }

    public function getQuestionSubjectId(): ?Question
    {
        return $this->question_subject_id;
    }

    public function setQuestionSubjectId(?Question $question_subject_id): static
    {
        $this->question_subject_id = $question_subject_id;

        return $this;
    }

    public function getAnswerSubjectId(): ?Answer
    {
        return $this->answer_subject_id;
    }

    public function setAnswerSubjectId(?Answer $answer_subject_id): static
    {
        $this->answer_subject_id = $answer_subject_id;

        return $this;
    }
}
