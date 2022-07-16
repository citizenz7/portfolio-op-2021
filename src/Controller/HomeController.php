<?php

namespace App\Controller;

use App\Repository\ExperienceRepository;
use App\Repository\FicheRepository;
use App\Repository\FormationRepository;
use App\Repository\HardskillRepository;
use App\Repository\PostRepository;
use App\Repository\SoftskillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(
        PostRepository $postRepository,
        FicheRepository $ficheRepository,
        ExperienceRepository $experienceRepository,
        FormationRepository $formationRepository,
        SoftskillRepository $softskillRepository,
        HardskillRepository $hardskillRepository
    ): Response {
        $fiches = $ficheRepository->findBy([], ['id' => 'DESC'], 6);
        $posts = $postRepository->findBy([], ['id' => 'DESC'], 4);
        $experiences = $experienceRepository->findBy([], ['date' => 'DESC']);
        $formations = $formationRepository->findBy([], ['date' => 'DESC']);
        $softSkills = $softskillRepository->findAll();
        $hardSkills = $hardskillRepository->findAll();

        return $this->render('home/index.html.twig', [
            'posts' => $posts,
            'fiches' => $fiches,
            'experiences' => $experiences,
            'formations' => $formations,
            'softSkills' => $softSkills,
            'hardSkills' => $hardSkills,
            'current_menu' => 'home',
        ]);
    }
}
