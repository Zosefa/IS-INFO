<?php
namespace App\Controller\admin;

use App\Entity\Carousel;
use App\Form\CarouselType;
use App\Repository\CarouselRepository;
use App\Repository\NiveauxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class CarouselController extends AbstractController
{
    #[Route('Carousel',name:'Carousel')]
    public function Carousel(Request $request, CarouselRepository $CarouselRepository,EntityManagerInterface $em):Response
    {
        $Carousel = new Carousel();
        $form = $this->createForm(CarouselType::class,$Carousel);
        $form->handleRequest($request); 
        if($form->isSubmitted()){
            $em->persist($Carousel);
            $em->flush();
            $this->addFlash('success','Insertion effectuer!');
            return $this->redirectToRoute('Carousel');
        }
        return $this->render('Admin/Carousel.html.twig',[
            'form' => $form,
            'Carousel' => $CarouselRepository->findAll()
        ]);
    }

    #[Route('Carousel/{id}',name:'Carousel_update')]
    public function Carousel_update(Carousel $Carousel, Request $request,EntityManagerInterface $em)
    {
        if($request->isMethod('POST')){
            $file = $request->files->get('file');
            if($file){
                $Carousel
                ->setMot($request->request->get('phrase'))
                ->setFileImage($file);
            $em->flush();
            $this->addFlash('success','Modification effectuer!');
            return $this->redirectToRoute('Carousel');
            }
            $Carousel
                ->setMot($request->request->get('phrase'));
            $em->flush();
            $this->addFlash('success','Modification effectuer!');
            return $this->redirectToRoute('Carousel');
        }
    }

    #[Route('Carousel/delete/{id}',name:'Carousel_delete')]
    public function Carousel_delete(Carousel $Carousel, EntityManagerInterface $em)
    {
        $em->remove($Carousel);
        $em->flush();
        $this->addFlash('success','Suppresion effectuer!');
        return $this->redirectToRoute('Carousel');
    }
}