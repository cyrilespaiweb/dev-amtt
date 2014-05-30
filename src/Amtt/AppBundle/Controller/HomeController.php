<?php

namespace Amtt\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends BaseController
{
    public function indexAction()
    {
        $datas = array('name'=>'toto');
        return $this->render('index.html.twig', $datas);
    }
}
