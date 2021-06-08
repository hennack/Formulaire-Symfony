<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\MainFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    // Accueil du formulaire

    

    /**
     * @Route("/", name="main")
     */

    //Route principale du formulaire

    public function index(Request $request): Response

    {
        // Création du formulaire 
        $data = new User;
        $form = $this->createForm(MainFormType::class, $data);

        // Ecoute du boutton 'Valider'
        $form->handleRequest($request);

        // test si le formulaire est bien soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->entityManager->persist($data);
            $this->entityManager->flush();
           
            // Redirection vers la route 'success' si le test est validé
            return $this->redirectToRoute('success');
        }

        return $this->render('main/index.html.twig', [
            'form' => $form->createView()
        ]);
    }


}
