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
        $service->setDescription('Vous cherchez un(e) Transporteur routier d\'exception ? Nous sommes SMS Express et notre équipe de professionnels est là pour vous aider. Nous répondons à vos attentes et les surpassons.');
        $this->setReference('livraison',$service);
        $manager->persist($service);

        $service1 = new Service();
        $service1->setService('montage meuble');
        $service1->setUrl('"https://i.ibb.co/ZJj5HRw/r-unions-mobilier-travailleur-professionnel-cr-ant-le-cabinet-au-salon-de-la-nouvelle-maison-deux-tr.jpg');
        $service1->setDescription('Nous montons et démontons tous les Meubles, quelle que soit la marque et quelle que soit la quantité, en urgence ou en RDV programmé, du lundi au dimanche et jours fériés.
        Nous ne sommes pas des magiciens, mais notre travail est de monter les meubles de nos clients à leur plus grande satisfaction, en respectant les recommandations du fabricant');
        $this->setReference('montage meuble',$service1);
        $manager->persist($service1);
        $service2 = new Service();
        $service2->setService('location camion');
        $service2->setUrl('https://imgbb.com/"><img src="https://i.ibb.co/n0yxddj/nos-types-de-vehicules-utilitaires5641c8ad73a1d.jpg');
        $service2->setDescription(' Sms Express met à votre disposition aujourd\'hui des Camions 20m3 avec Hayon élévateur, pour de la longue ou de la courte durée , avec  un kilométrage défini plus ou moins étendu .
        Vous êtes un particulier ? : Vous déménagez et vous n\'avez que votre petite voiture ? Venez louer notre camion utilitaire 20m3 pour charger et décharger en un seul voyage vos objets les plus précieux et les plus volumineux sans vous blesser grâce à son Hayon élévateur. Un véritable gains de temps et de praticité !
        Vous êtes un professionnels : Un client vous demande de lui livrer de la marchandise et vous n\'avez pas de véhicule adéquat , ou tout simplement vous avez une panne avec votre propre véhicule ?! Avec ce camion vous pourrez transporter de la petite et grande marchandise et mettre votre matériel à l\'abri.');
        $this->setReference('location camion',$service2);
        $manager->persist($service2);
        $service3 = new Service();
        $service3->setService('demenagement');
        $service3->setUrl('https://i.ibb.co/mzgyYQK/delivery-man-5123169.jpg');
        $service3->setDescription('Sms Express propose un service de demenagement ');
        $this->setReference('demenagement',$service3);
        $manager->persist($service3);

        $manager->flush();
    }
}
