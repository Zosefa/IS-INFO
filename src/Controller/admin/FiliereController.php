<?php
namespace App\Controller\admin;

use App\Entity\Filiere;
use App\Form\FiliereType;
use App\Repository\FiliereRepository;
use App\Repository\NiveauxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class FiliereController extends AbstractController
{
    #[Route('filiere',name:'filiere')]
    public function filiere(Request $request, FiliereRepository $filiereRepository,EntityManagerInterface $em,NiveauxRepository $niveaux):Response
    {
        $filiere = new Filiere();
        $form = $this->createForm(FiliereType::class,$filiere);
        $form->handleRequest($request); 
        if($form->isSubmitted()){
            $em->persist($filiere);
            $em->flush();
            $this->addFlash('success','Insertion Effectuer!');
            return $this->redirectToRoute('filiere');
        }
        return $this->render('Admin/Filiere.html.twig',[
            'form' => $form,
            'filiere' => $filiereRepository->findAll(),
            'Niveaux' => $niveaux->findAll()
        ]);
    }

    #[Route('filiere/{id}',name:'filiere_update')]
    public function filiere_update(Filiere $filiere, Request $request,EntityManagerInterface $em,NiveauxRepository $niveaux)
    {
        if($request->isMethod('POST')){
            $Niveaux = $niveaux->find($request->request->get('niveau'));
            $file = $request->files->get('file');
            if($file){
                $filiere
                ->setNomFiliere($request->request->get('nom'))
                ->setDescription($request->request->get('description'))
                ->setFileImage($file)
                ->setIdNiveaux($Niveaux);
            $em->flush();
            $this->addFlash('success','Modification effectuer!');
            return $this->redirectToRoute('filiere');
            }
            $filiere
                ->setNomFiliere($request->request->get('nom'))
                ->setDescription($request->request->get('description'))
                ->setIdNiveaux($Niveaux);
            $em->flush();
            $this->addFlash('success','Modification effectuer!');
            return $this->redirectToRoute('filiere');
        }
    }

    #[Route('filiere/delete/{id}',name:'filiere_delete')]
    public function filiere_delete(Filiere $filiere, EntityManagerInterface $em)
    {
        $em->remove($filiere);
        $em->flush();
        $this->addFlash('success','Suppresion effectuer!');
        return $this->redirectToRoute('filiere');
    }
}