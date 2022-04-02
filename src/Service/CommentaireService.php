<?php

namespace App\Service;

use App\Entity\Post;
use App\Entity\Commentaire;
use App\Entity\Fiche;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class CommentaireService
{
    private $manager;
    private $flash;
    public function __construct(EntityManagerInterface $manager, FlashBagInterface $flash)
    {
        $this->manager = $manager;
        $this->flash = $flash;
    }
    public function persistCommentaire(
        Commentaire $commentaire,
        Post $post = null,
        Fiche $fiche = null,
        TranslatorInterface $translator
    ): void {
        $commentaire->setIsPublished(false)
            ->setPost($post)
            ->setFiche($fiche)
            ->setCreatedAt(new DateTime('now'));

        $this->manager->persist($commentaire);
        $this->manager->flush();

        $message = $translator->trans('
            Votre commentaire a bien été envoyé ! Merci ! Il sera publié dès qu\'il sera appouvé par le modérateur.
        ');
        $this->flash->add('success', $message);
    }
}
