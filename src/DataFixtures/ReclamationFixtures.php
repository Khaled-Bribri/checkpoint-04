<?php

namespace App\DataFixtures;

use App\Entity\Reclamation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReclamationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $reclamation = new Reclamation();
        $reclamation->setReclamation('colis endommagé');
        $this->setReference('colis endommagé',$reclamation);
        $manager->persist($reclamation);

        $reclamation1 = new Reclamation();
        $reclamation1->setReclamation('meuble endommagé par le technicien');
        $this->setReference('meuble endommagé par le technicien',$reclamation1);
        $manager->persist($reclamation1);

        $reclamation2 = new Reclamation();
        $reclamation2->setReclamation('Non respect de planing communiqué');
        $this->setReference('Non respect de planing communiqué',$reclamation2);
        $manager->persist($reclamation2);

        $manager->flush();
    }
}
