<?php

namespace Amtt\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class BrandController extends FOSRestController {

    public function getBrandAction()
    {
        $this->get('brand')->findAll();

        exit;
        /*
        $em = $this->getDoctrine()->getManager('winelite')->getConnection();

        $qb = $em->createQueryBuilder();

        $qb->add('select', 'm')
            ->add('from', 'tbl_make m')
            ->add('where', 'm.MAKName LIKE %:name%')
            ->setParameter('name', 'Ford');

        $query = $qb->getQuery();
        */

        $em = $this->getDoctrine()->getManager('winelite');
        $qb = $em->createQueryBuilder();

        $qb->add('select', 'm')
            ->add('from', 'tbl_make m')
            ->add('where', 'm.MAKName LIKE %:name%')
            ->setParameter('name', 'Ford');

        $query = $qb->getQuery();
        $products = $query->getArrayResult();
        var_dump($products);
        exit;

        //$products = $query->getArrayResult();

        //var_dump($products);
        //return $this->container->get('doctrine.entity_manager')->getRepository('Brand')->find($id);
    }
} 