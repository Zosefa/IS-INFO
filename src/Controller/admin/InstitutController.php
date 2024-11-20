<?php
namespace App\Controller\admin;

use App\Form\InstitutType;
use App\Repository\InstitutRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class InstitutController extends AbstractController
{
    #[Route('/institut',name:'institut')]
    public function institut(InstitutRepository $institutRepository,EntityManagerInterface $em, Request $request):Response{
        $Institut = $institutRepository->find(1);
        $form = $this->createForm(InstitutType::class,$Institut);
        $form->handleRequest($request); 
        if($form->isSubmitted()){
            $em->persist($Institut);
            $em->flush();
            $this->addFlash('success','Modification effectuer!');
            return $this->redirectToRoute('institut');
        }
        return $this->render('Admin/Institut.html.twig',[
            'form' => $form,
            'institut' => $Institut
        ]);
    }
}