<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class AddLocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('locationText', TextType::class, [
                'label' => 'Název lokace',
            ])
            ->add('position', TextType::class, [
                'label' => 'Pozice',
            ])
            ->add('parent', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'position',
                'label' => 'Rodič',
                'placeholder' => 'Vyberte pozici',
                'required' => false,
            ])

            ->add('isEnding', CheckboxType::class, [
                'label' => 'Je koncová?',
                'required' => false,
            ])
            ->add('endingType', TextType::class, [
                'label' => 'Typ konce (volitelné)',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
