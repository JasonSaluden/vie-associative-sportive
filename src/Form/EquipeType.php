<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\Equipe;
use App\Entity\Licencie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomEquipe')
            ->add('licencies', EntityType::class, [
                'class' => Licencie::class,
                'choice_label' => 'id',
            ])
            ->add('equipes', EntityType::class, [
                'class' => Club::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipe::class,
        ]);
    }
}
