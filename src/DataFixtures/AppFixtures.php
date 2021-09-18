<?php

namespace App\DataFixtures;

use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create("fr_FR");
        for ($i=0; $i < 1000 ; $i++) { 
            $user = new User();
            $user->setFirstName($faker->firstName())
            ->setLastName($faker->lastName())
            ->setEmail($faker->safeEmail())
            ->setPassword(password_hash($faker->password(),PASSWORD_DEFAULT));
            $manager->persist($user);
        }


        $manager->flush();
    }
}
