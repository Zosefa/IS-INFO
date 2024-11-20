<?php

namespace App\Controller\front;

use App\Repository\CarouselRepository;
use App\Repository\DiplomeRepository;
use App\Repository\DirecteurRepository;
use App\Repository\EvenementRepository;
use App\Repository\FiliereRepository;
use App\Repository\FormationRepository;
use App\Repository\InstitutRepository;
use App\Repository\NiveauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AcceuilController extends AbstractController
{
    #[Route('/',name:'acceuil',methods:'GET')]
    public function acceuil(
        DirecteurRepository $directeur,InstitutRepository $institutRepository,FiliereRepository $filiereRepository, NiveauxRepository $niveauxRepository,DiplomeRepository $diplome,
        FormationRepository $formationRepository,EvenementRepository $evenementRepository,CarouselRepository $carouselRepository
    ):Response
    {
        $niveaux = $niveauxRepository->findAll();
        $filiereLicence = $filiereRepository->findBy(['IdNiveaux' => $niveaux[0]]);
        $filiereMaster = $filiereRepository->findBy(['IdNiveaux' => $niveaux[1]]);
        return $this->render('Acceuil/acceuil.html.twig',[
            'directeur' => $directeur->find(1),
            'institut' => $institutRepository->find(1),
            'filiere' => $filiereLicence,
            'filiereMaster' => $filiereMaster,
            'diplome' => $diplome->findAll(), 
            'formation' => $formationRepository->findAll(),
            'evenement' => $evenementRepository->getEvenement(),
            'filiereAll' => $filiereRepository->findAll(),
            'Carousel' => $carouselRepository->findAll()
        ]);
    }
}