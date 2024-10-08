<?php 

namespace Src\Adapter;

use Src\Port\InMemoryPortInterface;

class InMemoryMysqlAdapter implements InMemoryPortInterface 
{
    public function find(array $filter)
    {
   
    }

    public function findAll()
    {

    }

    public function insert(array $data)
    {

    }

    public function save(?string $path, string $data)
    {
        // TODO: Implement save() method.
    }
}