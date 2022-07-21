<?php

namespace App\DataFixtures;

use App\Entity\Commande;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommandeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $commande = new Commande();
        $date = new \DateTime('now');
        $commande->setCommandeDebut($date);
        $commande->setCommandeFin($date);
        $commande->setStatus(true);
        $commande->setCamion($this->getReference('Camion Mercedes'));
        $this->addReference('commande01',$commande);

        $manager->persist($commande);

        $manager->flush();
    }

    public function getDependencies()
    {

        return [
          CamionFixtures::class,
        ];
    }
}
