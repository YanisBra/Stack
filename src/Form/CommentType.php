<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\Comment;
use App\Entity\Member;
use App\Entity\Question;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('comment')
            ->add('author_id', EntityType::class, [
                'class' => Member::class,
'choice_label' => 'id',
            ])
            ->add('question_subject_id', EntityType::class, [
                'class' => Question::class,
'choice_label' => 'id',
            ])
            ->add('answer_subject_id', EntityType::class, [
                'class' => Answer::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
