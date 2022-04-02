<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Fiche;
use App\Entity\Categorie;
use App\Entity\Formation;
use App\Entity\Hardskill;
use App\Entity\Softskill;
use App\Entity\Experience;
use App\Entity\Commentaire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio Olivier Prieur');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('MAIN');
        yield MenuItem::linkToRoute('Home', 'fas fa-home', 'home');
        yield MenuItem::section('ADMIN');
        yield MenuItem::linktoDashboard('Dashboard', 'fas fa-users-cog');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-tags', Categorie::class);
        yield MenuItem::linkToCrud('Posts', 'fas fa-newspaper', Post::class);
        yield MenuItem::linkToCrud('Fiches portfolio', 'fas fa-file-image', Fiche::class);
        yield MenuItem::linkToCrud('Expérience', 'fas fa-briefcase', Experience::class);
        yield MenuItem::linkToCrud('Formation', 'fas fa-graduation-cap', Formation::class);
        yield MenuItem::linkToCrud('Hard skills', 'fas fa-chalkboard-teacher', Hardskill::class);
        yield MenuItem::linkToCrud('Soft skills', 'fas fa-grin-hearts', Softskill::class);
        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comment', Commentaire::class);
    }
}
