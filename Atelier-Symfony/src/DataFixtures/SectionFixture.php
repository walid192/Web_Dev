<?php

namespace App\DataFixtures;

use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SectionFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
//        $sections=[
//            "Arts",
//            "Biologie & écologie" ,
//            "Histoire-géographie",
//            "géopolitique et sciences politiques",
//            "Humanités",
//            "littérature et philosophie",
//            "Langues et littérature",
//            "culture étrangère",
//            "Littérature",
//            "Langues et cultures de l’Antiquité",
//            "Mathématiques",
//            ];
//        for ($i=0;$i<11;$i++){
//            $section=new Section();
//            $section->setDesignation($sections[$i]);
//            $manager->persist($section);
//        }
        $manager->flush();

    }
}