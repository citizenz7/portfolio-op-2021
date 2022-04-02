<?php

namespace App\Tests;

use App\Entity\Experience;
use DateTime;
use PHPUnit\Framework\TestCase;

class ExperienceUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $datetime = new DateTime();
        $experience = new Experience();

        $experience->setTitre('titre')
            ->setLieu('lieu')
            ->setPresentation('presentation')
            ->setDate($datetime)
            ->setDateEnd($datetime);

        $this->assertTrue($experience->getTitre() === 'titre');
        $this->assertTrue($experience->getLieu() === 'lieu');
        $this->assertTrue($experience->getPresentation() === 'presentation');
        $this->assertTrue($experience->getDate() === $datetime);
        $this->assertTrue($experience->getDateEnd() === $datetime);
    }

    public function testIsFalse()
    {
        $experience = new Experience();
        $datetime = new DateTime();

        $experience->setTitre('titre')
            ->setLieu('lieu')
            ->setPresentation('presentation')
            ->setDate($datetime)
            ->setDateEnd($datetime);

        $this->assertFalse($experience->getTitre() === 'false');
        $this->assertFalse($experience->getLieu() === 'false');
        $this->assertFalse($experience->getPresentation() === 'false');
        $this->assertFalse($experience->getDate() === 'false');
        $this->assertFalse($experience->getDateEnd() === 'false');
    }

    public function testIsEmpty()
    {
        $experience = new Experience();

        $this->assertEmpty($experience->getTitre());
        $this->assertEmpty($experience->getLieu());
        $this->assertEmpty($experience->getPresentation());
        $this->assertEmpty($experience->getDate());
        $this->assertEmpty($experience->getDateEnd());
    }
}
