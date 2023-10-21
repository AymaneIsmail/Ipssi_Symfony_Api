<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestProcedureController extends AbstractController
{
    #[Route('/api/commande/user/{id}', name: 'app_test')]
    public function index(Commande $commande,CommandeRepository $commandeRepository): Response
    {
        return new JsonResponse($commandeRepository->executeProcedure($commande->getId()));
    }
}
