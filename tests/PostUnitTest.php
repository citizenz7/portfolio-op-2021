<?php

namespace App\Tests;

use DateTime;
use App\Entity\Post;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class PostUnityTest extends TestCase
{
    public function testisTrue()
    {
        $post = new Post();
        $datetime = new DateTime();
        $user = new User();

        $post->setAuteur($user)
            ->setTitre('titre')
            ->setContenu('contenu')
            ->setCreatedAt($datetime)
            ->setImage('image')
            ->setSlug('slug')
            ->setUrl('url');

        $this->assertTrue($post->getAuteur() === $user);
        $this->assertTrue($post->getTitre() === 'titre');
        $this->assertTrue($post->getContenu() === 'contenu');
        $this->assertTrue($post->getCreatedAt() === $datetime);
        $this->assertTrue($post->getImage() === 'image');
        $this->assertTrue($post->getSlug() === 'slug');
        $this->assertTrue($post->getUrl() === 'url');
    }

    public function testisFalse()
    {
        $post = new Post();
        $datetime = new DateTime();
        $user = new User();

        $post->setAuteur($user)
            ->setTitre('titre')
            ->setContenu('contenu')
            ->setCreatedAt($datetime)
            ->setImage('image')
            ->setSlug('slug')
            ->setSlug('url');

        $this->assertFalse($post->getAuteur() === new User());
        $this->assertFalse($post->getTitre() === 'false');
        $this->assertFalse($post->getContenu() === 'false');
        $this->assertFalse($post->getCreatedAt() === new DateTime());
        $this->assertFalse($post->getImage() === 'false');
        $this->assertFalse($post->getSlug() === 'false');
        $this->assertFalse($post->getUrl() === 'false');
    }

    public function testIsEmpty()
    {
        $post = new Post();

        $this->assertEmpty($post->getAuteur());
        $this->assertEmpty($post->getTitre());
        $this->assertEmpty($post->getContenu());
        $this->assertEmpty($post->getCreatedAt());
        $this->assertEmpty($post->getImage());
        $this->assertEmpty($post->getSlug());
        $this->assertEmpty($post->getUrl());
        $this->assertEmpty($post->getId());
    }
}
