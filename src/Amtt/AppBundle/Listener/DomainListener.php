<?php

namespace Amtt\AppBundle\Listener;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;

class DomainListener {
    public function onDomainParse(Event $event)
    {
        $request = $event->getRequest();
        $session = $request->getSession();

        //echo $request->getHost();
        //$session->set('subdomain', $request->getHost());
    }
} 