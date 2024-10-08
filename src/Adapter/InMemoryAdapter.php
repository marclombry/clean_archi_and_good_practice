<?php 

namespace Src\Adapter;

use Src\Port\InMemoryPortInterface;

class InMemoryAdapter implements InMemoryPortInterface 
{
    public function find(array $filter)
    {
   
    }

    public function findAll()
    {

    }

    public function insert(array $data)
    {
        // TODO: Implement insert() method.
    }

    public function save(?string $path, string $data)
    {
        // TODO: Implement save() method.
    }
}