<?php

namespace Amtt\AppBundle\Controller\Occasions;

use Amtt\AppBundle\Controller\BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends BaseController
{

    public function showAction($slug,$id)
    {
        $repository = $this->get('occasions_vehicule');
        $product = $repository->findById($id)->getFirstResult();

        if(!$product)
        {
            throw new NotFoundHttpException;
        }

        return $this->render('product_details.html.twig', array('product' => $product));
    }

    /*
    public function lastProductsByBrandAction($brands = array(),$limit = 1)
    {
        if(!count($brands)){
            $brands = array('RENAULT','PEUGEOT','CITROEN','AUDI','BMW','VOLKSWAGEN');
        }



        $repository = $this->get('occasions_vehicule');
        $product = $repository->findAll($id)->getFirstResult();

        if(!$product)
        {
            throw new NotFoundHttpException;
        }

        return $this->render('product_details.html.twig', array('product' => $product));
    }
    */



}
