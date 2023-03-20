<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\Personne;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeEtudiantController extends AbstractController
{
    #[Route('/liste', name: 'app_liste_etudiant')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository=$doctrine->getRepository(Etudiant::class);
        $etudiants=$repository->findAll();
        return $this->render('liste_etudiant/index.html.twig', [
            'etudiants' => '$etudiants',
        ]);
    }




    #[Route('/liste/add/{name}/{prenom}/{section}', name: 'liste.add')]
    public function add($name,$prenom,$section,ManagerRegistry $doctrine){

        $manager=$doctrine->getRepository(Etudiant::class);

        $etudiant=new Etudiant();
        $etudiant->setNom($name);
        $etudiant->setPrenom($prenom);
        $etudiant->setSection($section);

        $manager->add($etudiant,true);

        return $this->render('liste_etudiant/index.html.twig', [
            'etudiants' => '$etudiants',
        ]);

}


}
