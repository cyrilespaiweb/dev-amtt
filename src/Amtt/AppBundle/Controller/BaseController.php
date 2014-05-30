<?php

namespace Amtt\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    public function render($view, array $parameters = array(), Response $response = null)
    {
        $this->container->get('twig.loader')->addPath($this->get('kernel')->getRootDir() .'/../src/Amtt/AppBundle/Resources/views/Front/clubauto-fnac');
        return parent::render($view, $parameters, $response);
    }
}
