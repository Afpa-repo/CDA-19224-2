<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserProType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('mail',null,
            [
                'label' => "Votre email :",
                'attr' => ['placeholder' => 'email@domaine.fr']
            ])
            ->add('password', PasswordType::class, 
            [
                'label' => "Votre mot de passe :",
                'attr' => ['placeholder' => '8 caractères minimum']
            ])
            ->add('confirm_password', PasswordType::class,
            [
                'label' => "Votre mot de passe :",
                'attr' => ['placeholder' => '8 caractères minimum']
            ])
            ->add('Nom',
            null,
            [
                'label' => "Votre nom :",
                'attr' => ['placeholder' => 'Jean-Marie']
            ])
            ->add('Prenom',
            null,
            [
                'label' => "Votre prénom :",
                'attr' => ['placeholder' => 'Jean-Marie']
            ])
            ->add('telephone',
            null,
            [
                'label' => "Votre numéro de télephone :",
                'attr' => ['placeholder' => '0612345678']
            ])
            ->add('adresse',
            null,
            [
                'label' => "Votre adresse de société:",
                'attr' => ['placeholder' => '123 rue de la liberté']
            ])
            ->add('siren',
            null,
            [
                'label' => "Votre identifiant d'entreprise :",
                'attr' => ['placeholder' => '078945612']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
