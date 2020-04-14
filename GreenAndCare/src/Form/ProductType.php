<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\SubCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('subCategory', EntityType::class, [
                'class' => SubCategory::class,
                'choice_label' => 'name',
                'label' => 'Sous-catégorie'
            ])
            ->add('short_description')
            ->add('long_description', TextareaType::class)
            ->add('price', MoneyType::class, [
                'currency' => 'EUR'
            ])
            ->add('soldout')
            ->add('promo', CheckboxType::class, [
                'label' => 'afficher en promo',
                'required' => false
            ])
            ->add('promoPrice', MoneyType::class, [
                'currency' => 'EUR',
                'label' => 'Prix promo',
                'required' => false
            ])
            ->add('percentageDiscount',PercentType::class, [
                'label' => 'Réduction',
                'required' => false
            ])
            ->add('quantityInStock')
            ->add('content')

            ->add('imageFile',FileType::class, [
                    'required' => false,
                ]

            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
            'translation_domain' => 'forms'
        ]);
    }
}
