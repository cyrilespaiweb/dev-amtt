<?php
namespace Amtt\ApiBundle\Service;


class BaseService {
    protected $connection;

    public function __construct($doctrine)
    {
        $this->connection = $doctrine->getManager('winelite')->getConnection();
    }
} 