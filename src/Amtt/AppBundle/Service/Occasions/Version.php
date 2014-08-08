<?php
namespace Amtt\AppBundle\Service\Occasions;

class Version extends BaseService {

    public function findAll()
    {
        $queryBuilder = $this->manager->createQueryBuilder('vo_uni')
            ->select("DISTINCT(TRIM(version)) AS name")
            ->from("vo_uni", "v")
            ->where('v.id_vo != 0')
            ->andWhere("reserve = 0")
            ->orderBy("version","ASC")
        ;

        $this->setQueryBuilder($queryBuilder);

        return $this;
    }

    public function findByModel($model)
    {
        $queryBuilder = $this->findAll()->getQueryBuilder()
                        ->andWhere('v.modele = :model')
                        ->setParameter('model',$model);

        $this->setQueryBuilder($queryBuilder);

        return $this;
    }
}