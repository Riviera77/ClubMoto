<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Repository\MarqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class MarqueController extends AbstractController
{
    // create CRUD Create, Read (tous et 1), Update, Delete
    // je rajoute la method GET et ou POST
    //je rajoute dead&dumb Method pour voir si la route est bien appelée avt template
    //je rajoute un requirements pour vérifier que l'id est un entier

    // route marque générée automatiquement; sera utilisée pour afficher 
    //une partie du Read (tous : la liste des marques)
    #[Route('/marque', name: 'marque_index', methods: ['GET'])]
    public function index(MarqueRepository $marqueRepository): Response
    {
        return $this->render('marque/index.html.twig', [
            //requête findAll = SELECT * FROM marque WHERE id = valeur 
            //le resultat de cette requete est passée à la vue =template marques
            'marques' => $marqueRepository->findAll(),
        ]);
    }


    // je crée la route marque_show : sera utilisée pour afficher 1 marque 
    //en partie du Read (1)
    
    #[Route('/marque/{id}', name: 'marque_show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(Marque $marque): Response
    {
        return $this->render('marque/show.html.twig', [
            'marque' => $marque
        ]);
    }

    // je crée la route marque_create : sera utilisée pour 
    //afficher le formulaire de création d'une marque
    #[Route('/marque/create', name: 'marque_create', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function create(): Response
    {
        dd(__METHOD__);
        return $this->render('marque/create.html.twig', [
            'controller_name' => 'MarqueController',
            
        ]);
    }

    // je crée la route marque_update : sera utilisée pour
    // afficher le formulaire de modification d'une marque
    #[Route('/marque/{id}/update', name: 'marque_update', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function update(int $id): Response
    {
        dd(__METHOD__);
        return $this->render('marque/update.html.twig', [
            'controller_name' => 'MarqueController',
            'id' => $id
        ]);
    }

    // je crée la route marque_delete : sera utilisée pour
    // afficher le formulaire de suppression d'une marque
    #[Route('/marque/{id}/delete', name: 'marque_delete', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function delete(int $id): Response
    {
        dd(__METHOD__);
        return $this->render('marque/delete.html.twig', [
            'controller_name' => 'MarqueController',
            'id' => $id
        ]);
    }

}