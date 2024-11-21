<?php

namespace App\Form;

use App\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class TeamType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('name')
      ->add('established', null, [
        'widget' => 'single_text',
      ])
      ->add('logoPath', FileType::class, [
        'required' => false,
        'mapped' => false,
        'attr' => ['accept' => 'image/jpeg, image/png, image/webp'],
        'constraints' => [
          new File([
            'maxSize' => '1024k',
            'mimeTypes' => [
              'image/jpeg',
              'image/png',
              'image/webp',
            ],
            'mimeTypesMessage' => 'Please upload a valid image file',
          ]),
        ],
      ])
      ->add('save', SubmitType::class, [
        'attr' => ['class' => 'btn btn-primary'],
      ])
      ->add('reset', ResetType::class, [
        'attr' => ['class' => 'btn btn-secondary'],
      ])
    ;
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Team::class,
    ]);
  }
}
