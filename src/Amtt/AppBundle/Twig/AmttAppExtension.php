<?php
namespace Amtt\AppBundle\Twig;

class AmttAppExtension extends \Twig_Extension {

    public function getFunctions() {
        return array(
            'url_occasion' => new \Twig_Function_Method($this, 'urlOccasion'),
        );
    }

    public function urlOccasion($product)
    {
        $url = null;

        if(is_array($product))
        {
            $url = 'occasion-'.str_replace(' ', '-', $product['marque'].'-'.$product['modele'].'-'.$product['version'].'-'.$product['id_unique']).'.php';
        }

        return  $url;
    }

    public function getName()
    {
        return 'amttapp_extension';
    }

} 