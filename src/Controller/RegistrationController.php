<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class RegistrationController extends AbstractController
{
    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();

        if ($request->isMethod('post')) {
            $email = $request->request->get('email');
                $user
                    ->setEmail($email)
                    ->setRoles(['ROLE_ADMIN'])
                    ->setPassword($userPasswordHasher->hashPassword($user, '000000'));
                $entityManager->persist($user);
                $entityManager->flush();

                return $this->redirectToRoute('responsable');
        }

        return $this->render('Admin/Responsable/New.html.twig');
    }
}
