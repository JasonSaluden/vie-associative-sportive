<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\Licencie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LicencieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomLicencie')
            ->add('prenomLicencie')
            ->add('photoLicencie')
            ->add('dateNaissance', null, [
                'widget' => 'single_text',
            ])
            ->add('clubs', EntityType::class, [
                'class' => Club::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Licencie::class,
        ]);
    }
}
