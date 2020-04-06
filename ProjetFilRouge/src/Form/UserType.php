<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mail')
            ->add('password', PasswordType::class)
            ->add('confirm_password', PasswordType::class)
            ->add('Nom')
            ->add('Prenom')
            ->add('telephone')
            ->add('adresse')
            ->add('it_is_pro',CheckboxType::class,[
                'required' => false
            ])
            ->add('siren',null,[
                'required' => false
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