<?php

namespace Src\Shared\Tool;

use Src\Port\InMemoryPortInterface;

class FileSystem implements InMemoryPortInterface
{
    public function save(?string $path, mixed $data): void
    {
        if(!file_exists($path))
        {
            file_put_contents($path, $data);
        } else {
            $file = file_get_contents($path);
            $file .= ';'. $data;
            file_put_contents($path, $file);
        }
    }

    public function find(array $filter)
    {
        // TODO: Implement find() method.
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    public function insert(array $data)
    {
        // TODO: Implement insert() method.
    }
}