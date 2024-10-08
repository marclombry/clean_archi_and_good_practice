<?php

use Src\Adapter\InMemoryMysqlAdapter;
use Src\Infrastructure\Persistance\InMemoryServiceReservationRepository;
use Src\Domain\Repository\ServiceReservationRepositoryInterface;

it("check serviceReservation has a find and findAll method", function() {
    $mysqlAdapter = new InMemoryMysqlAdapter();
    $serviceReservation = new InMemoryServiceReservationRepository($mysqlAdapter);
    expect($serviceReservation)->toHaveMethods(['find','findAll']);
});