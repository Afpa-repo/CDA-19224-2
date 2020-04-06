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
<<<<<<< HEAD
            ->add('mail')
=======
        ->add('mail')
>>>>>>> c014c8c2a5ddff0a54800e95aa480d439d3ee775
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
<<<<<<< HEAD
}
=======
}
>>>>>>> c014c8c2a5ddff0a54800e95aa480d439d3ee775
