<?php

namespace App\Tests;

use App\Entity\Hardskill;
use DateTime;
use PHPUnit\Framework\TestCase;

class HardskillsUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $datetime = new DateTime();
        $hardskills = new Hardskill();

        $hardskills->setTitre('titre');

        $this->assertTrue($hardskills->getTitre() === 'titre');
    }

    public function testIsFalse()
    {
        $hardskills = new Hardskill();
        $datetime = new DateTime();

        $hardskills->setTitre('titre');

        $this->assertFalse($hardskills->getTitre() === 'false');
    }

    public function testIsEmpty()
    {
        $hardskills = new Hardskill();

        $this->assertEmpty($hardskills->getTitre());
    }
}
