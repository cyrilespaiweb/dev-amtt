<?php

namespace Amtt\AppBundle\Controller\Occasions;

use Amtt\AppBundle\Controller\BaseController;

class LayoutController extends BaseController
{
    public function topMenuAction()
    {
        $website = $this->container->get('session')->get('website');

        $datas = $this->getDoctrine()
                    ->getRepository('AmttAppBundle:Page')
                    ->findByWebsite($website->getId());

        return $this->render('AmttAppBundle:Shared:Brand/list.html.twig', array('page_list'=>$datas));
    }
}
