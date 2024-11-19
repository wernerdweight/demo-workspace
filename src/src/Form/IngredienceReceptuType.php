<?php

namespace App\Form;

use App\Entity\Ingredience;
use App\Entity\IngredienceReceptu;
use App\Entity\Recepty;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IngredienceReceptuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mnozstvi')
            ->add('ingredience', EntityType::class, [
                'class' => Ingredience::class,
                'choice_label' => 'nazev',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => IngredienceReceptu::class,
        ]);
    }
}
