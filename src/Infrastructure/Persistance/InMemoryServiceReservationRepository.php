<?php 
namespace Src\Infrastructure\Persistance;

use Src\Domain\Repository\ServiceReservationRepositoryInterface;
use Src\Port\InMemoryPortInterface;

class InMemoryServiceReservationRepository
{

    public function __construct(protected InMemoryPortInterface $inMemoryPortInterface){}

    public function find(array $filter)
    {
        return $this->inMemoryPortInterface->find($filter);
    }

    public function findAll()
    {
        return $this->inMemoryPortInterface->findAll();
    }

    public function insert(array $data)
    {
        $this->inMemoryPortInterface->insert($data);
    }
}