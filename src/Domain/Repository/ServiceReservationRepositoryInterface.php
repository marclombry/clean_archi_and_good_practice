<?php 
namespace Src\Domain\Repository;

interface ServiceReservationRepositoryInterface 
{
    public function find(array $filter);

    public function findAll();
}