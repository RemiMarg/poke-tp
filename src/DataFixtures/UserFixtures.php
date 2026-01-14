<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $password = $this->userPasswordHasher->hashPassword(new User(), 'toto');

        $user = new User();
        $user->setEmail('user@gmail.com');
        $user->setPassword($password);
        $user->setRoles(['ROLE_USER']);

        $manager->persist($user);

        $userAdmin = new User();
        $userAdmin->setEmail('admin@gmail.com');
        $userAdmin->setPassword($this->userPasswordHasher->hashPassword(new User(), 'toto'));
        $userAdmin->setRoles(['ROLE_ADMIN']);
        $manager->persist($userAdmin);

        $manager->flush();
    }
}
