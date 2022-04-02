<?php

namespace App\Controller;

use App\Repository\FicheRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    /**
     * @Route("/sitemap.xml", name="sitemap", defaults={"_format"="xml"})
     */
    public function index(
        Request $request,
        PostRepository $postRepository,
        FicheRepository $ficheRepository
    ): Response {
        $hostname = $request->getSchemeAndHttpHost();
        $urls = [];

        $urls[] = ['loc'    => $this->generateUrl('home')];
        $urls[] = ['loc'    => $this->generateUrl('contact')];
        $urls[] = ['loc'    => $this->generateUrl('portfolio')];
        $urls[] = ['loc'    => $this->generateUrl('posts')];

        foreach ($ficheRepository->findAll() as $fiche) {
            $urls[] = [
                'loc'       => $this->generateUrl('detailportfolio', ['slug' => $fiche->getSlug()])
            ];
        }

        foreach ($postRepository->findAll() as $post) {
            $urls[] = [
                'loc'       => $this->generateUrl('detailpost', ['slug' => $post->getSlug()]),
                'lastmod'   => $post->getCreatedAt()->format('Y-m-d')
            ];
        }

        $response = new Response(
            $this->renderView('sitemap/index.html.twig', [
                'urls'      => $urls,
                'hostname'  => $hostname,
            ]),
            200
        );
        $response->headers->set('Content-type', 'text/xml');
        return $response;
    }
}
