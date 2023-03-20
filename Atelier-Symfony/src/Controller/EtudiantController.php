<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/', name: 'app_etudiant')]
    public function index(ManagerRegistry $managerRegistry): Response
    {
        $repository=$managerRegistry->getRepository(Etudiant::class);
        $etudiants=$repository->findAll();
        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }


    #[Route('/edit/{id?0}', name: 'app_etudiant_add')]
    public function updateEtudiant(Etudiant $etudiant=null,Request $request,ManagerRegistry $manager)
    {  $repository=$manager->getManager();
        $new=false;
        if (!$etudiant) {
            $new = true;
            $etudiant = new Etudiant();
        }
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $repository->persist($etudiant);
            $repository->flush();
            if($new) {
                $message = " a été ajouté avec succès";
            } else {
                $message = " a été mis à jour avec succès";
            }
            $this->addFlash('success',$etudiant->getNom(). $message );
            return $this->redirectToRoute('app_etudiant');
        } else {
            return $this->render('etudiant/add.html.twig', [
                'form' => $form->createView()
            ]);
        }
    }




    #[Route('/delete/{id}',name: 'ap_del')]
    public function deleteEtudiant(Etudiant $etudiant=null,ManagerRegistry $doctrine): Response
    {   $manager=$doctrine->getManager();
        if(!$etudiant)
    {
        $this->addFlash('error',"existe pas");
    }
        $manager->remove($etudiant);
        $manager->flush();
        $this->addFlash('success',"etudiant a ete supprime avec succes");
        return $this->redirectToRoute('app_etudiant');}

}
