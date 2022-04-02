<?php

namespace App\Tests;

use App\Entity\Formation;
use DateTime;
use PHPUnit\Framework\TestCase;

class FormationUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $datetime = new DateTime();
        $formation = new Formation();

        $formation->setTitre('titre')
            ->setLieu('lieu')
            ->setPresentation('presentation')
            ->setDate($datetime)
            ->setDateEnd($datetime);

        $this->assertTrue($formation->getTitre() === 'titre');
        $this->assertTrue($formation->getLieu() === 'lieu');
        $this->assertTrue($formation->getPresentation() === 'presentation');
        $this->assertTrue($formation->getDate() === $datetime);
        $this->assertTrue($formation->getDateEnd() === $datetime);
    }

    public function testIsFalse()
    {
        $formation = new Formation();
        $datetime = new DateTime();

        $formation->setTitre('titre')
            ->setLieu('lieu')
            ->setPresentation('presentation')
            ->setDate($datetime)
            ->setDateEnd($datetime);

        $this->assertFalse($formation->getTitre() === 'false');
        $this->assertFalse($formation->getLieu() === 'false');
        $this->assertFalse($formation->getPresentation() === 'false');
        $this->assertFalse($formation->getDate() === 'false');
        $this->assertFalse($formation->getDateEnd() === 'false');
    }

    public function testIsEmpty()
    {
        $formation = new Formation();

        $this->assertEmpty($formation->getTitre());
        $this->assertEmpty($formation->getLieu());
        $this->assertEmpty($formation->getPresentation());
        $this->assertEmpty($formation->getDate());
        $this->assertEmpty($formation->getDateEnd());
    }
}
