<?php

namespace App\DataFixtures;

use App\Entity\Directeur;
use App\Entity\Institut;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private readonly UserPasswordHasherInterface $hasher)
    {
        
    }
    public function load(ObjectManager $manager): void
    {
        // $directeur = new Directeur();
        // $directeur
        //     ->setNom('RAKOTOARIVAO')
        //     ->setPrenom('Manohisoa Tsiory')
        //     ->setMotdirecteur('Mot du directeur')
        //     ->setImage('image');
        // $manager->persist($directeur);
        // $manager->flush();

        // $institut = new Institut();
        // $institut
        //     ->setNomInstitut('IS-INFO (INSTITUT SUPERIEUR D\'INFORMATIQUE)')
        //     ->setAgrement('Agremenet')
        //     ->setDescription('Descritpion')
        //     ->setSiege('Ampasamadinika')
        //     ->setEmail('isinfo@gmail.com')
        //     ->setLogo('Logo');
        //     $manager->persist($institut);
        //     $manager->flush();

        $user = new User();
        $user->setEmail('isinfo@gmail.com')
        ->setRoles(["ROLE_ADMIN"])
        ->setPassword($this->hasher->hashPassword($user,'123456'));
        $manager->persist($user);
        $manager->flush();   
    }
}
