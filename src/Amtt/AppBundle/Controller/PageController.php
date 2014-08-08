<?php

namespace Amtt\AppBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends BaseController
{
    public function showAction($slug)
    {
        $website = $this->container->get('session')->get('website');

        $page = $this->getDoctrine()
            ->getRepository('AmttAppBundle:Page')
            ->findOneBy(array('website' => $website->getId(),'slug' => $slug));

        if(!$page)
        {
            throw new NotFoundHttpException('Page not found');
        }

        $page->getBlocks();

        return $this->render('page.html.twig', array('page' => $page));
    }
}
