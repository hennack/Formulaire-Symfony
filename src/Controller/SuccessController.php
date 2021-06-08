<?php

namespace App\Controller;

use App\Entity\Data;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class SuccessController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/success", name="success")
     */

    // Route vers l'affichage des données du formulaire

    public function index(): Response
    {
        // récupérationd e la dernière entrée en base de donnée sur le critère 'ID'
        $data = $this->entityManager->getRepository(User::class)->findoneBy([],['id' => 'DESC']);
       
       
        return $this->render('success/index.html.twig', [
            'data' => $data
        ]);
    }
}
