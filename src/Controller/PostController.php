<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\PostRepository;
use App\Service\CommentaireService;
use App\Repository\CommentaireRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    /**
     * @Route("/posts", name="posts")
     */
    public function index(
        Request $request,
        PostRepository $postRepository,
        PaginatorInterface $paginator
    ): Response {
        $data = $postRepository->findBy([], ['id' => 'DESC']);

        $posts = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/posts/{slug}", name="detailpost")
     */
    public function detail(
        Post $post,
        Request $request,
        CommentaireService $commentaireService,
        CommentaireRepository $commentaireRepository
    ): Response {
        $commentaires = $commentaireRepository->findCommentaires($post);
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaire = $form->getData();
            $commentaireService->persistCommentaire($commentaire, $post, null);

            return $this->redirectToRoute('detailpost', ['slug' => $post->getSlug()]);
        }

        return $this->render('post/detail.html.twig', [
            'posts' => $post,
            'commentaires' => $commentaires,
            'form' => $form->createView(),

        ]);
    }
}
