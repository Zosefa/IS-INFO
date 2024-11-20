<?php
namespace App\Controller\admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class ResponsableController extends AbstractController
{
    #[Route('Responsable',name:'responsable')]
    public function Responsable(Request $request,EntityManagerInterface $em):Response
    {
        $user = $this->getUser();
        return $this->render('Admin/Responsable/Update.html.twig',[
            'user' => $user
        ]);
    }

    #[Route('Responsable/{id}',name:'responsable_update')]
    public function ResponsableUpdate(User $user,Request $request,EntityManagerInterface $em,UserPasswordHasherInterface $hasher)
    {
        $motdepasse = $request->request->get('password');
        $confirmer = $request->request->get('confirmer');
        if($motdepasse != ' ' && $confirmer != ' '){
            if($motdepasse == $confirmer){
                $user
                    ->setPassword($hasher->hashPassword($user, $motdepasse))
                    ->setEmail($request->request->get('email'));
                $em->flush();
                $this->addFlash('success','Modification effectuer!');
                return $this->redirectToRoute('responsable');
            }else{
                $this->addFlash('danger','le mot de passe ne correspond pas!');
                return $this->redirectToRoute('responsable');
            }
        }else{
            $user
                ->setEmail($request->request->get('email'));
            $em->flush();
            $this->addFlash('success','Modification effectuer!');
            return $this->redirectToRoute('responsable');
        }
    }
}