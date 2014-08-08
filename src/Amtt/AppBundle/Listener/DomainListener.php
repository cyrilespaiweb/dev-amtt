<?php

namespace Amtt\AppBundle\Listener;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DomainListener {

    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function onDomainParse(Event $event)
    {
        $request = $event->getRequest();
        $session = $request->getSession();
        $host = $request->getHost();
        $host = str_replace('dev-','',$host);

        $object =  $this->em->getRepository('AmttAppBundle:Website')->findOneByUri($host);

        if (!$object) {
            throw new NotFoundHttpException("Website not found!!!!");
        }

        $session->set('website', $object);
    }
}