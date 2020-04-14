<?php

namespace App\Form;

use App\Entity\ProductSearch;
use App\Entity\SubCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxPrice', IntegerType::class, [ // champ du form flitre permettant de saisir le prix max
                'required' => false,
                'label' => 'Prix',
                'attr' => [
                    'placeholder' => 'Prix max'
                ]
            ])
            ->add('inPromo', CheckboxType::class, [
                'required' => false,
                'label' => 'Promotion(s)',
            ])
            ->add('subCategories', EntityType::class, [
                'required' => false,
                'label' => 'Catégorie',
                'class' => SubCategory::class,
                'choice_label' => 'name',
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProductSearch::class,
            'method' => 'get', // on change la method du form en get
            'csrf_protection' => false // la recherche d'un produit ne nécessite pas de token csrf
        ]);
    }

    public function getBlockPrefix() // method qui va permettre de ne pas renvoyer la valeur par défaut la method d'envoi du form
    {
        return '';
    }

}
