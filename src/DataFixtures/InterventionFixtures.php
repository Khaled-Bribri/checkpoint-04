<?php

namespace App\DataFixtures;

use App\Entity\Intervention;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class InterventionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $intervention = new Intervention();
        $date = new \DateTime('now');
        $intervention->setDateArrivee($date);
        $intervention->setDateDepart($date);
        $intervention->setObservation('Rien à signaler');
        $intervention->setCamion($this->getReference('Camion Mercedes'));
        $manager->persist($intervention);

        $manager->flush();
    }

    public function getDependencies()
    {

        return [
          CamionFixtures::class,
        ];
    }
}
