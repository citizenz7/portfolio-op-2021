<?php

namespace App\Tests;

use App\Entity\Categorie;
use PHPUnit\Framework\TestCase;

class CategorieUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $categorie = new Categorie();

        $categorie->setTitre('titre')
            ->setSlug('slug');

        $this->assertTrue($categorie->getTitre() === 'titre');
        $this->assertTrue($categorie->getSlug() === 'slug');
    }

    public function testIsFalse()
    {
        $categorie = new Categorie();

        $categorie->setTitre('titre')
            ->setSlug('slug');

        $this->assertFalse($categorie->getTitre() === 'false');
        $this->assertFalse($categorie->getSlug() === 'false');
    }

    public function testIsEmpty()
    {
        $categorie = new Categorie();

        $this->assertEmpty($categorie->getTitre());
        $this->assertEmpty($categorie->getSlug());
        $this->assertEmpty($categorie->getId());
    }
}
