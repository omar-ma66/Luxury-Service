<?php

namespace App\Form;

use App\Entity\Candidature;
use App\Entity\Job;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('genre')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('pays')
            ->add('nationalite')
            ->add('dateNaissance', null, [
                'widget' => 'single_text',
            ])
            ->add('email')
            ->add('password')
            ->add('jobCategorie')
            ->add('experience')
            ->add('dateCreation', null, [
                'widget' => 'single_text',
            ])
            ->add('dateMiseAjour', null, [
                'widget' => 'single_text',
            ])
            ->add('jobs', EntityType::class, [
                'class' => Job::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidature::class,
        ]);
    }
}
