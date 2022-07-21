<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $role = new Role();
        $role->setRole('admin');
        $manager->persist($role);

        $role1 = new Role();
        $role1->setRole('user');
        $manager->persist($role1);

        $manager->flush();
    }
}
