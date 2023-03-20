<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EtudiantFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $repository=$manager->getRepository(Section::class);
        $sections=$repository->findAll();
        $faker=Factory::create();


        for($i=0;$i<100;$i++)
        {
            $etudiant=new Etudiant();
            $etudiant->setNom($faker->name);
            $etudiant->setPrenom($faker->firstName);
            if ($i%5!=0){
                $rand=rand(0,10);
                $etudiant->setSection($sections[$rand]);
                $etudiant->setDesignation($sections[$rand]->getDesignation());
            }
            else {
                $etudiant->setSection(null);
                $etudiant->setDesignation("etudiant pas encore affecte");

            }

            $manager->persist($etudiant);


        }

        $manager->flush();
    }
}