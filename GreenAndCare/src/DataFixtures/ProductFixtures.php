<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for($i = 0; $i < 100; $i++){
            $product = new Product();
            $product
                ->setTitle($faker->words(5, true))
                ->setShortDescription($faker->sentences(1, true))
                ->setLongDescription($faker->sentences(3, true))
                ->setPrice($faker->randomFloat(2,1,100))
                ->setCreatedAt($faker->dateTimeBetween('-2 years', 'now', null))
                ->setPromo(false)
                ->setSoldout(false);
            $manager->persist($product);
        }
        $manager->flush();
    }
}