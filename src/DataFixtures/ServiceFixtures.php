<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $service = new Service();
        $service->setService('livraison');
        $service->setUrl('https://i.ibb.co/d5jYMMD/d12acad905a0fd2f9478096ea993dcca.png');
        $service->setDescription('livraison 7/7');
        $this->setReference('livraison',$service);
        $manager->persist($service);

        $service1 = new Service();
        $service1->setService('montage meuble');
        $service1->setUrl('https://i.ibb.co/d5jYMMD/d12acad905a0fd2f9478096ea993dcca.png');
        $service1->setDescription('Montage Meuble .......');
        $this->setReference('montage meuble',$service1);
        $manager->persist($service1);

        $service2 = new Service();
        $service2->setService('location camion');
        $service2->setUrl('https://i.ibb.co/d5jYMMD/d12acad905a0fd2f9478096ea993dcca.png');
        $service2->setDescription('location de camion 7/7');
        $this->setReference('location camion',$service2);
        $manager->persist($service2);
        
        $service3 = new Service();
        $service3->setService('demenagement');
        $service3->setUrl('https://i.ibb.co/d5jYMMD/d12acad905a0fd2f9478096ea993dcca.png');
        $service3->setDescription('Sms Express propose un service de demenagement ');
        $this->setReference('demenagement',$service3);
        $manager->persist($service3);

        $manager->flush();
    }
}
