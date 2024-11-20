<?php
namespace App\Controller\admin;

use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class FormationController extends AbstractController
{
    #[Route('formation',name:'Formation')]
    public function Formation(Request $request, FormationRepository $FormationRepository,EntityManagerInterface $em):Response
    {
        $Formation = new Formation();
        $form = $this->createForm(FormationType::class,$Formation);
        $form->handleRequest($request); 
        if($form->isSubmitted()){
            $em->persist($Formation);
            $em->flush();
            $this->addFlash('success','insertion effectuer!');
            return $this->redirectToRoute('Formation');
        }
        return $this->render('Admin/Formation.html.twig',[
            'form' => $form,
            'formation' => $FormationRepository->findAll()
        ]);
    }

    #[Route('formation/{id}',name:'formation_update')]
    public function formation_update(formation $formation, Request $request,EntityManagerInterface $em,formationRepository $formationRepository)
    {
        if($request->isMethod('POST')){
            $formation
                ->setNomFormation($request->request->get('formation'))
                ->setDescription($request->request->get('description'));
            $em->flush();
            $this->addFlash('success','Modification effectuer!');
            return $this->redirectToRoute('Formation');
        }
    }

    #[Route('formation/delete/{id}',name:'formation_delete')]
    public function formation_delete(formation $formation, EntityManagerInterface $em)
    {
        $em->remove($formation);
        $em->flush();
        $this->addFlash('success','Suppression effectuer!');
        return $this->redirectToRoute('Formation');
    }
}