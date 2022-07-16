<?php

namespace App\Tests;

use DateTime;
use App\Entity\Fiche;
use App\Entity\Categorie;
use PHPUnit\Framework\TestCase;

class ItemUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $fiche = new Fiche();
        $datetime = new DateTime();
        $categorie = new Categorie();

        $fiche->setTitre('titre')
            ->setPresentation('presentation')
            ->setTechno('techno')
            ->setAnnee($datetime)
            ->setImage('image')
            ->setSlug('slug')
            ->setUrl('url')
            ->setFilter('filter')
            ->addCategorie($categorie);

        $this->assertTrue($fiche->getTitre() === 'titre');
        $this->assertTrue($fiche->getPresentation() === 'presentation');
        $this->assertTrue($fiche->getTechno() === 'techno');
        $this->assertTrue($fiche->getAnnee() === $datetime);
        $this->assertTrue($fiche->getImage() === 'image');
        $this->assertTrue($fiche->getSlug() === 'slug');
        $this->assertTrue($fiche->getUrl() === 'url');
        $this->assertTrue($fiche->getFilter() === 'filter');
        $this->assertContains($categorie, $fiche->getCategorie());
    }

    public function testIsFalse()
    {
        $fiche = new Fiche();
        $datetime = new DateTime();
        $categorie = new Categorie();

        $fiche->setTitre('titre')
            ->setPresentation('presentation')
            ->setTechno('techno')
            ->setAnnee($datetime)
            ->setImage('image')
            ->setSlug('slug')
            ->setUrl('url')
            ->setFilter('filter')
            ->addCategorie($categorie);

        $this->assertFalse($fiche->getTitre() === 'false');
        $this->assertFalse($fiche->getPresentation() === 'false');
        $this->assertFalse($fiche->getTechno() === 'false');
        $this->assertFalse($fiche->getAnnee() === new DateTime());
        $this->assertFalse($fiche->getImage() === 'false');
        $this->assertFalse($fiche->getSlug() === 'false');
        $this->assertFalse($fiche->getUrl() === 'false');
        $this->assertFalse($fiche->getFilter() === 'false');
        $this->assertNotContains(new Categorie(), $fiche->getCategorie());
    }

    public function testIsEmpty()
    {
        $fiche = new Fiche();

        $this->assertEmpty($fiche->getTitre());
        $this->assertEmpty($fiche->getPresentation());
        $this->assertEmpty($fiche->getTechno());
        $this->assertEmpty($fiche->getAnnee());
        $this->assertEmpty($fiche->getImage());
        $this->assertEmpty($fiche->getSlug());
        $this->assertEmpty($fiche->getUrl());
        $this->assertEmpty($fiche->getFilter());
        $this->assertEmpty($fiche->getCategorie());
    }
}
