<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $user->setEmail('true@test.com')
            ->setPassword('password')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setAvatar('avatar')
            ->setAdresse('adresse')
            ->setTelephone('telephone')
            ->setAPropos('a propos')
            ->setTwitter('twitter')
            ->setGithub('github')
            ->setGitlab('gitlab')
            ->setLinkedin('linkedin')
            ->setStatus('status');

        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getUsername() === 'true@test.com');
        $this->assertTrue($user->getUserIdentifier() === 'true@test.com');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getPrenom() === 'prenom');
        $this->assertTrue($user->getNom() === 'nom');
        $this->assertTrue($user->getAvatar() === 'avatar');
        $this->assertTrue($user->getAdresse() === 'adresse');
        $this->assertTrue($user->getTelephone() === 'telephone');
        $this->assertTrue($user->getAPropos() === 'a propos');
        $this->assertTrue($user->getTwitter() === 'twitter');
        $this->assertTrue($user->getGithub() === 'github');
        $this->assertTrue($user->getGitlab() === 'gitlab');
        $this->assertTrue($user->getLinkedin() === 'linkedin');
        $this->assertTrue($user->getStatus() === 'status');
    }

    public function testIsFalse()
    {
        $user = new User();

        $user->setEmail('true@test.com')
            ->setPassword('password')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setNom('avatar')
            ->setNom('adresse')
            ->setNom('telephone')
            ->setAPropos('a propos')
            ->setNom('twitter')
            ->setNom('github')
            ->setNom('gitlab')
            ->setNom('linkedin')
            ->setNom('status');

        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getUsername() === 'false@test.com');
        $this->assertFalse($user->getUserIdentifier() === 'false@test.com');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getAvatar() === 'false');
        $this->assertFalse($user->getAdresse() === 'false');
        $this->assertFalse($user->getTelephone() === 'false');
        $this->assertFalse($user->getAPropos() === 'false');
        $this->assertFalse($user->getTwitter() === 'false');
        $this->assertFalse($user->getGithub() === 'false');
        $this->assertFalse($user->getGitlab() === 'false');
        $this->assertFalse($user->getLinkedin() === 'false');
        $this->assertFalse($user->getStatus() === 'false');
    }

    public function testIsEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getUsername());
        $this->assertEmpty($user->getUserIdentifier());
        //$this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getAvatar());
        $this->assertEmpty($user->getAdresse());
        $this->assertEmpty($user->getTelephone());
        $this->assertEmpty($user->getAPropos());
        $this->assertEmpty($user->getTwitter());
        $this->assertEmpty($user->getGithub());
        $this->assertEmpty($user->getGitlab());
        $this->assertEmpty($user->getLinkedin());
        $this->assertEmpty($user->getStatus());
        $this->assertEmpty($user->getId());
    }
}
