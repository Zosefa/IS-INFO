<?php
namespace App\Controller\admin;

use App\Entity\Diplome;
use App\Form\DiplomeType;
use App\Repository\DiplomeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class DiplomeController extends AbstractController
{
    #[Route('diplome',name:'Diplome')]
    public function Diplome(Request $request, DiplomeRepository $DiplomeRepository,EntityManagerInterface $em):Response
    {
        $Diplome = new Diplome(); 
        $form = $this->createForm(DiplomeType::class,$Diplome);
        $form->handleRequest($request); 
        if($form->isSubmitted()){
            $em->persist($Diplome);
            $em->flush();
            $this->addFlash('success','Insertion effectuer!');
            return $this->redirectToRoute('Diplome');
        }
        return $this->render('Admin/Diplome.html.twig',[
            'form' => $form,
            'Diplome' => $DiplomeRepository->findAll()
        ]);
    }

    #[Route('diplome/{id}',name:'diplome_update')]
    public function diplome_update(diplome $diplome, Request $request,EntityManagerInterface $em,diplomeRepository $diplomeRepository)
    {
        if($request->isMethod('POST')){
            $diplome
                ->setNomdiplome($request->request->get('diplome'))
                ->setCategorie($request->request->get('categorie'));
            $em->flush();
            $this->addFlash('success','Modification effectuer!');
            return $this->redirectToRoute('Diplome');
        }
    }

    #[Route('diplome/delete/{id}',name:'diplome_delete')]
    public function diplome_delete(diplome $diplome, EntityManagerInterface $em)
    {
        $em->remove($diplome);
        $em->flush();
        $this->addFlash('success','Suppresion effectuer!');
        return $this->redirectToRoute('Diplome');
    }
}