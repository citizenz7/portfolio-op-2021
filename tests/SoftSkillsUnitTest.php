<?php

namespace App\Tests;

use App\Entity\Softskill;
use DateTime;
use PHPUnit\Framework\TestCase;

class SoftskillsUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $datetime = new DateTime();
        $softskills = new Softskill();

        $softskills->setTitre('titre');

        $this->assertTrue($softskills->getTitre() === 'titre');
    }

    public function testIsFalse()
    {
        $softskills = new Softskill();
        $datetime = new DateTime();

        $softskills->setTitre('titre');

        $this->assertFalse($softskills->getTitre() === 'false');
    }

    public function testIsEmpty()
    {
        $softskills = new Softskill();

        $this->assertEmpty($softskills->getTitre());
    }
}
