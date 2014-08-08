<?php
namespace Amtt\AppBundle\Service\Occasions;

class Fuel extends BaseService {

    public function findAll()
    {
        $queryBuilder = $this->manager->createQueryBuilder('vo_uni')
            ->select("DISTINCT(energie) AS name")
            ->from("vo_uni", "v")
            ->where('v.id_vo != 0')
            ->andWhere("reserve = 0")
            ->orderBy("energie","ASC")
        ;

        $this->setQueryBuilder($queryBuilder);

        return $this;
    }
}