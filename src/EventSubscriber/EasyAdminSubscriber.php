<?php

namespace App\EventSubscriber;

use DateTime;
use App\Entity\Post;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setDateAndUser'],
        ];
    }

    public function setDateAndUser(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        // POur chaque post, on set la date et le user
        if (($entity instanceof Post)) {
            $now = new DateTime('now');
            $entity->setCreatedAt($now);

            $user = $this->security->getUser();
            $entity->setAuteur($user);
        }

        return;
    }
}
