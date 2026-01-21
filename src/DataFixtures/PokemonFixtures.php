<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PokemonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // $poke = new Pokemon();
        // $poke->setLabel('pikachu');
        // $manager->persist($poke);
        // $poke->setLabel('test');
        // $manager->persist($poke);

        // $manager->flush();

        foreach (['pikachu', 'test', 'test1', 'test2', 'test3', 'test4'] as $label) {
            $poke = new Pokemon();
            $poke->setLabel($label);
            $manager->persist($poke);
        }

        $manager->flush();
    }
}
