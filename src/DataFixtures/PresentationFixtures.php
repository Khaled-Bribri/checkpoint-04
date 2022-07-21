<?php

namespace App\DataFixtures;

use App\Entity\Presentation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PresentationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $presentation = new Presentation();
        $presentation->setTitre('SMS Express: Livraisons Montage Meubles Déménagements Debarras');
        $presentation->setPresentation('Des solutions de transport personnalisées pour nos clients et 100% de satisfaction garantie à des prix très compétitifs.
        Nous assurons le transport de vos marchandises avec le plus grand soin et une fiabilité incomparable en Suisse et en Europe.
        Avec nous, vous pouvez être sûrs que vos biens arriveront à temps et en parfait état, quelle que soit la destination ou le type de marchandise.');
        $presentation->setUrl('https://i.ibb.co/d5jYMMD/d12acad905a0fd2f9478096ea993dcca.png');
        $manager->persist($presentation);
        $manager->flush();
    }
}
