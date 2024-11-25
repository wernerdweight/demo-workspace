<?php

namespace App\Form;

use App\Entity\Choice;
use App\Entity\Location;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('choiceText', null, [
                'label' => 'Text volby',
            ])
            ->add('fromLocation', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'position',
                'label' => 'Z lokace',
            ])
            ->add('toLocation', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'position',
                'label' => 'Do lokace',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Choice::class,
        ]);
    }
}
