<?php
namespace App\Controller\admin;

use App\Entity\Niveaux;
use App\Repository\NiveauxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class NiveauxController extends AbstractController
{
    #[Route('/niveaux',name:'niveaux')]
    public function Niveaux(Request $request,EntityManagerInterface $em,NiveauxRepository $niveauRepository):Response
    {
        $niveau = new Niveaux();
        if($request->isMethod('POST')){
            $nomNiveau = $request->request->get('niveau');
            if($nomNiveau != ''){
                $niveau->setNiveaux($nomNiveau);
                $em->persist($niveau);
                $this->addFlash('success','Insertion effectuer!');
                $em->flush();
                return $this->redirectToRoute('niveaux');
            }else{
                $this->addFlash('danger','Veuillez saisir le champs');
            }
        }
        return $this->render('Admin/Niveau.html.twig',[
            'niveau' => $niveauRepository->findAll()
        ]);
    }

    #[Route('niveaux/{id}',name:'niveaux_update')]
    public function niveaux_update(niveaux $niveaux, Request $request,EntityManagerInterface $em,NiveauxRepository $niveauxRepository)
    {
        if($request->isMethod('POST')){
            $niveaux->setNiveaux($request->request->get('niveau'));
            $em->flush();
            $this->addFlash('success','Modification effectuer!');
            return $this->redirectToRoute('niveaux');
        }
    }

    #[Route('niveaux/delete/{id}',name:'niveaux_delete')]
    public function niveaux_delete(niveaux $niveaux, EntityManagerInterface $em)
    {
        $em->remove($niveaux);
        $em->flush();
        $this->addFlash('success','Suppression effectuer!');
        return $this->redirectToRoute('niveaux');
    }
}