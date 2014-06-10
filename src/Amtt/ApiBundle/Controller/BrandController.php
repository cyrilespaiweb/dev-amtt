<?php

namespace Amtt\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class BrandController extends FOSRestController {

    public function getBrandAction()
    {
        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();

        $qb->add('select', 'm')
            ->add('from', 'tbl_make m')
            ->add('where', 'm.MAKName LIKE %:name%')
            ->setParameter('name', 'Ford');

        $query = $qb->getQuery();

        $products = $query->getArrayResult();

        var_dump($products);
        //return $this->container->get('doctrine.entity_manager')->getRepository('Brand')->find($id);
    }
} 