<?php

namespace App\Controller;

use App\Entity\Fiche;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\FicheRepository;
use App\Service\CommentaireService;
use App\Repository\CommentaireRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function index(
        FicheRepository $ficheRepository
    ): Response {
        return $this->render('portfolio/index.html.twig', [
            'fiches' => $ficheRepository->findAll(),
        ]);
    }

    /**
     * @Route("/portfolio/{slug}", name="detailportfolio")
     */
    public function detail(
        Fiche $fiches,
        Request $request,
        CommentaireService $commentaireService,
        CommentaireRepository $commentaireRepository
    ): Response {
        $commentaires = $commentaireRepository->findCommentaires($fiches);
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaire = $form->getData();
            $commentaireService->persistCommentaire($commentaire, null, $fiches);

            return $this->redirectToRoute('detailportfolio', ['slug' => $fiches->getSlug()]);
        }


        return $this->render('portfolio/detail.html.twig', [
            'fiches' => $fiches,
            'form' => $form->createView(),
            'commentaires' => $commentaires,
        ]);
    }
}
