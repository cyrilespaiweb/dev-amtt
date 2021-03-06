<?php

namespace Amtt\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityRepository;

class BaseController extends Controller
{
    public function render($view, array $parameters = array(), Response $response = null)
    {
        $website = $this->container->get('session')->get('website');
        $this->container->get('twig')->addGlobal('website', $website);
        $this->container->get('twig.loader')->addPath($this->get('kernel')->getRootDir() .'/../src/Amtt/AppBundle/Resources/views/Front/'.$website->getInternalCode());
        return parent::render($view, $parameters, $response);
    }
}
