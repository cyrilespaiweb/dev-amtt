<?php

namespace Amtt\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class BrandController extends FOSRestController {

    public function getBrandAction()
    {
        $datas = $this->get('occasions_brand')->findAll()->getResult();

        return array('brands' => $datas);
    }
} 