<?php

namespace Amtt\ApiBundle\Service;

class Brand extends BaseService {

    public function findAll()
    {
        $sql = "SELECT DISTINCT tbl_make.MAKName
                FROM dbo.tbl_make
                ORDER BY
                CASE
                   WHEN MAKName = 'DACIA' THEN 4
                   WHEN MAKName = 'MINI' THEN 3
                   WHEN MAKName = 'JEEP'  THEN 2
                   WHEN MAKName = 'KIA' THEN 1
                END DESC
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        echo '<pre>';
        print_r($results);
        echo '</pre>';
    }
}