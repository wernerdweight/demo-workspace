<?php

namespace App\Form;

use App\Entity\Recepty;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ReceptType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Obtiznost')
            ->add('Cas')
            ->add('nazev')
            ->add('postup')
            ->add('imagepath')
            ->add('ingredience', CollectionType::class, [
                'entry_type' => IngredienceReceptuType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->add('submit', SubmitType::class, ['label' => 'Uložit'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recepty::class,
        ]);
    }
}
