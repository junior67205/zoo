<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    // pour haché les mdp on a besoin d'un constructeur
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('contactzoo@zooarcadia.com');
        $admin->setRoles(['ROLE_ADMINISTRATEUR']);
        $admin->setPassword(
            $this->passwordHasher->hashPassword($admin, 'admin')
        );
        $manager->persist($admin);

        $employe = new User();
        $employe->setEmail('employezoo@zooarcadia.com');
        $employe->setRoles(['ROLE_EMPLOYE']);
        $employe->setPassword(
            $this->passwordHasher->hashPassword($employe, 'admin')
        );
        $manager->persist($employe);

        $veterinaire = new User();
        $veterinaire->setEmail('veterinairezoo@zooarcadia.com');
        $veterinaire->setRoles(['ROLE_VETERINAIRE']);
        $veterinaire->setPassword(
            $this->passwordHasher->hashPassword($veterinaire, 'admin')
        );
        $manager->persist($veterinaire);

        $manager->flush();
    }
}