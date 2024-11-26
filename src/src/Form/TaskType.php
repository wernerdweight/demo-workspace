<?php

namespace App\Form;

use App\Entity\Task;
use App\Enum\ListingType;
use App\Enum\ScopeType;
use Ehyiah\QuillJsBundle\Form\QuillType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'attr' => ['class' => 'form-control name-field'],
        ])
        ->add('scope', EnumType::class, [
            'attr' => ['class' => 'radio-options'],
            'class' => ScopeType::class,
            'expanded' => true,
            'multiple' => false,
        ])
        ->add('listing', EnumType::class, [
            'attr' => ['class' => 'radio-options'],
            'class' => ListingType::class,
            'expanded' => true,
            'multiple' => false,
        ])
        ->add('description', QuillType::class , [
            'label' => 'Description',
        ])
        ->add('submit', SubmitType::class, [
            'attr' => ['class' => 'btn btn-primary submit-button'],
        ]);
    }      

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}