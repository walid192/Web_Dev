<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SectionFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        $faker=Factory::create('fr_FR');

        //Remplissage liste de section
        for ($i=0;$i<10;$i++)
            {
                $section=new Section();
                $section->setDesignation($faker->randomElement($array = array ('GL','RT','IA','IMI','')));
                $manager->persist($section);
            }


        //Remplissage liste d'etudiant
        for ($i=0;$i<50;$i++){
            $etudiant=new Etudiant();
            $etudiant->setNom($faker->name);
            $etudiant->setPrenom($faker->firstname);
            $manager->persist($etudiant);
        }




        $manager->flush();
    }
}
