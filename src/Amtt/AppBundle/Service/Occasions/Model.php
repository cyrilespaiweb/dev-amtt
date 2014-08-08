<?php
namespace Amtt\AppBundle\Service\Occasions;

class Model extends BaseService {

    public function findAll()
    {
        $queryBuilder = $this->manager->createQueryBuilder('vo_uni')
            ->select("DISTINCT(TRIM(modele)) AS name")
            ->from("vo_uni", "v")
            ->where('v.id_vo != 0')
            ->andWhere("reserve = 0")
            ->orderBy("modele","ASC")
        ;

        $this->setQueryBuilder($queryBuilder);

        return $this;
    }

    public function findByBrand($brand)
    {
        $queryBuilder = $this->findAll()->getQueryBuilder()
                        ->andWhere('v.marque = :brand')
                        ->setParameter('brand',$brand);

        $this->setQueryBuilder($queryBuilder);

        return $this;
    }
}