<?php
namespace App\Controller\admin;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class EvenementController extends AbstractController
{
    #[Route('Evenement',name:'Evenement')]
    public function Evenement(Request $request, EvenementRepository $EvenementRepository,EntityManagerInterface $em):Response
    {
        $Evenement = new Evenement();
        $form = $this->createForm(EvenementType::class,$Evenement);
        $form->handleRequest($request); 
        if($form->isSubmitted()){ 
            $em->persist($Evenement);
            $em->flush();
            $this->addFlash('success','Insertion effectuer!');
            return $this->redirectToRoute('Evenement');
        }
        return $this->render('Admin/Evenement.html.twig',[
            'form' => $form,
            'Evenement' => $EvenementRepository->findAll()
        ]);
    }

    #[Route('evenement/{id}',name:'evenement_update')]
    public function evenement_update(evenement $evenement, Request $request,EntityManagerInterface $em)
    {
        if($request->isMethod('POST')){
            $file = $request->files->get('file');
            if($file){
                $evenement
                ->setNomevenement($request->request->get('nom'))
                ->setDescription($request->request->get('description'))
                ->setLieuEvenement($request->request->get('lieu'))
                ->setDateEvenement(new DateTime($request->request->get('date')))
                ->setFileImage($file);
            $em->flush();
            $this->addFlash('success','Modification effectuer!');
            return $this->redirectToRoute('Evenement');
            }
            $evenement
                ->setNomevenement($request->request->get('nom'))
                ->setDescription($request->request->get('description'))
                ->setLieuEvenement($request->request->get('lieu'))
                ->setDateEvenement(new DateTime($request->request->get('date')));
            $em->flush();
            $this->addFlash('success','Modification effectuer!');
            return $this->redirectToRoute('Evenement');
        }
    }

    #[Route('Evenement/delete/{id}',name:'evenement_delete')]
    public function evenement_delete(Evenement $evenement, EntityManagerInterface $em)
    {
        $em->remove($evenement);
        $em->flush();
        $this->addFlash('success','Suppresion effectuer!');
        return $this->redirectToRoute('Evenement');
    }
}