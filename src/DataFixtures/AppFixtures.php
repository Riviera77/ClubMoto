<?php

namespace App\DataFixtures;

use App\Entity\Marque;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        $marque1 = new Marque();
        //setter
        $marque1->setLibelle('KTM');
        $manager->persist($marque1);

        // $product = new Product();
        $marque2 = new Marque();
        //setter
        $marque2->setLibelle('Triumph');
        $manager->persist($marque2);

        $manager->flush();
    }

    
}