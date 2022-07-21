<?php

namespace App\DataFixtures;

use App\Entity\ReclamationClient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ReclamationClientFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $reclamationclient = new ReclamationClient();

        $reclamationclient->setDescription('le colis est arrivé endommagé');
        $reclamationclient->setReclamation($this->getReference('colis endommagé'));
        $reclamationclient->addUser($this->getReference('user01'));
        $reclamationclient->addCommande($this->getReference('commande01'));
        $manager->persist($reclamationclient);

        $manager->flush();
    }
    public function getDependencies()
    {

        return [
          CommandeFixtures::class,UserFixtures::class,ReclamationFixtures::class
        ];
    }
}
