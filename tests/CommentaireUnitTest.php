<?php

namespace App\Tests;

use DateTime;
use App\Entity\Post;
use App\Entity\Commentaire;
use App\Entity\Fiche;
use PHPUnit\Framework\TestCase;

class CommentaireUnitTest extends TestCase
{
    public function testisTrue()
    {
        $commentaire = new Commentaire();
        $datetime = new DateTime();
        $post = new Post();
        $fiche = new Fiche();

        $commentaire->setAuteur('auteur')
            ->setEmail('email@test.com')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setpost($post)
            ->setFiche($fiche);

        $this->assertTrue($commentaire->getAuteur() === 'auteur');
        $this->assertTrue($commentaire->getEmail() === 'email@test.com');
        $this->assertTrue($commentaire->getCreatedAt() === $datetime);
        $this->assertTrue($commentaire->getContenu() === 'contenu');
        $this->assertTrue($commentaire->getPost() === $post);
        $this->assertTrue($commentaire->getFiche() === $fiche);
    }

    public function testisFalse()
    {
        $commentaire = new Commentaire();
        $datetime = new DateTime();
        $post = new Post();
        $fiche = new Fiche();

        $commentaire->setAuteur('false')
            ->setEmail('false@test.com')
            ->setCreatedAt(new DateTime())
            ->setContenu('false')
            ->setPost(new Post())
            ->setFiche(new Fiche());

        $this->assertFalse($commentaire->getAuteur() === 'auteur');
        $this->assertFalse($commentaire->getEmail() === 'email@test.com');
        $this->assertFalse($commentaire->getCreatedAt() === $datetime);
        $this->assertFalse($commentaire->getContenu() === 'contenu');
        $this->assertFalse($commentaire->getPost() === $post);
        $this->assertFalse($commentaire->getFiche() === $fiche);
    }

    public function testisEmpty()
    {
        $commentaire = new Commentaire();

        $this->assertEmpty($commentaire->getAuteur());
        $this->assertEmpty($commentaire->getEmail());
        $this->assertEmpty($commentaire->getCreatedAt());
        $this->assertEmpty($commentaire->getContenu());
        $this->assertEmpty($commentaire->getPost());
        $this->assertEmpty($commentaire->getFiche());
        $this->assertEmpty($commentaire->getId());
    }
}
