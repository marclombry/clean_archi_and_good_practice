<?php 

namespace Src\Port;

interface InMemoryPortInterface 
{
    public function find(array $filter);

    public function findAll();

    public function insert(array $data);

    public function save(?string $path, string $data);

}