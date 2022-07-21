<?php

namespace App\DataFixtures;

use App\Entity\CamionType;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CamionTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $camionType = new CamionType();
        $camionType->setType('Camion avec hayon');
        $manager->persist($camionType);
        $this->addReference('Camion avec hayon',$camionType);

        $camionType1 = new CamionType();
        $camionType1->setType('Camion 20 m3');
        $manager->persist($camionType1);
        $this->addReference('Camion 20 m3',$camionType1);

        $manager->flush();
    }
}
