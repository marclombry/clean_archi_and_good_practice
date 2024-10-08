<?php

namespace Src\Infrastructure\Repository;

use Src\Infrastructure\Database\DatabaseStructureAdapter;
use Src\Port\InMemoryPortInterface;

class UserServicesRepository implements InMemoryPortInterface
{

    public function __construct(Private DatabaseStructureAdapter $database){}

    public function find($filter)
    {
        $this->database->setTable('users');
        $userServicesResponse = $this->database->select($filter);

        return $userServicesResponse;
    }

    public function findAll()
    {
        $this->database->setTable('users');
        $userServicesResponse = $this->database->all();

        return $userServicesResponse;
    }

    public function insert(array $data)
    {
        $this->database->setTable('users');
        $this->database->execute($data);
    }

    public function save(?string $path, string $data)
    {

    }
}