<?php

namespace App\Form;

use App\Entity\Task;
use Ehyiah\QuillJsBundle\Form\QuillType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'attr' => ['class' => 'form-control name-field'],
        ])
        ->add('description', QuillType::class , [
            'label' => 'Description',
        ])
        ->add('currentWeek', CheckboxType::class, [
            'attr' => ['class' => 'form-check-input current-week-checkbox'],
            'required' => false, // Checkbox obvykle nebývá povinný
        ])
        ->add('nextWeek', CheckboxType::class, [
            'attr' => ['class' => 'form-check-input next-week-checkbox'],
            'required' => false,
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
