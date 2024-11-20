<?php
namespace App\Controller\admin;

use App\Form\DirecteurType;
use App\Repository\DirecteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class DirecteurController extends AbstractController
{
    #[Route('Directeur',name:'Directeur')]
    public function Directeur(Request $request, DirecteurRepository $DirecteurRepository,EntityManagerInterface $em):Response
    {
        $Directeur = $DirecteurRepository->find(1);
        $form = $this->createForm(DirecteurType::class,$Directeur);
        $form->handleRequest($request); 
        if($form->isSubmitted()){
            $em->persist($Directeur);
            $em->flush();
            $this->addFlash('success','Modification effectuer!');
            return $this->redirectToRoute('Directeur');
        }
        return $this->render('Admin/Directeur.html.twig',[
            'form' => $form,
            'directeur' => $Directeur
        ]);
    }
}