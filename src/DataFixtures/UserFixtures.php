<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    

    
    private $passwordHasher;


    public function __construct(
       
        UserPasswordHasherInterface $passwordHasher
    ) {
        
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();

        $user->setEmail('admin@admin.com');
        $user->setNom('Bribri');
        $user->setPrenom('Khaled');
        $user->setRoles(['ROLE_ADMIN']);
        $datedenaissance = new \DateTime('23-09-1990');
        $user->setPassword('password');
        $hashedPassword = $this->passwordHasher->hashPassword($user, $user->getPassword());
        $user->setPassword($hashedPassword);
        $manager->persist($user);
        $this->setReference('user01',$user);

        $user1 = new User();

        $user1->setEmail('user@user.com');
        $user1->setNom('Bribri');
        $user1->setPrenom('Khaled');
        $user1->setRoles(['ROLE_USER']);
        $datedenaissance = new \DateTime('23-09-1990');
        $user1->setPassword('password');
        $hashedPassword = $this->passwordHasher->hashPassword($user1, $user1->getPassword());
        $user1->setPassword($hashedPassword);
        $manager->persist($user1);
        $this->setReference('user02',$user1);
        

        $manager->flush();
    }
}
