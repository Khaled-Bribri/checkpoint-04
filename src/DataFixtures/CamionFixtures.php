<?php

namespace App\DataFixtures;

use App\Entity\Camion;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\CamionTypeFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CamionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $camion = new Camion();
        $camion->setName('Camion Renault');
        $camion->setKM(100000);
        $camion->setCamionType($this->getReference('Camion 20 m3'));
        $manager->persist($camion);
        $this->setReference('Camion Renault',$camion);

        $camion1 = new Camion();
        $camion1->setName('Camion Mercedes');
        $camion1->setKM(120000);
        $camion1->setCamionType($this->getReference('Camion avec hayon'));
        $manager->persist($camion1);
        $this->setReference('Camion Mercedes',$camion1);

        $manager->flush();
    }
    public function getDependencies()
    {

        return [
          CamionTypeFixtures::class,
        ];
    }
}
