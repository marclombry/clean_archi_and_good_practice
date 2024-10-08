<?php 
use Src\Infrastructure\Persistance\InMemoryServiceReservationRepository;
use Src\Adapter\InMemoryAdapter;
use Src\Adapter\InMemoryMysqlAdapter;
use Src\Config\DatabaseConfig;
use Src\Infrastructure\Database\DatabaseStructureAdapter;
use Src\Port\InMemoryPortInterface;
use Src\Infrastructure\Repository\ServiceReservationRepository;

describe("when the service consult their reservation", function(){
    it("service consult one reservation by id with someone database", function() {
        $config = new DatabaseConfig();
        $config->setEnv('env_test.php');
        $database = new DatabaseStructureAdapter($config->getConfig());
        $serviceReservation = new ServiceReservationRepository($database);
        $serviceReservationRepository = new InMemoryServiceReservationRepository($serviceReservation);
        $firstReservation = $serviceReservationRepository->find(['id' => 1]);
        $reservation = [
            'id' => 1,
            'date_reservation' => "2000-01-01",
            'timezone' => 'Europe/Paris',
            'hours' => "[6, 30]"
        ];
        expect($firstReservation)->toMatchArray($reservation);
    });
    
    it("service consult all reservation by id", function() {
        $config = new DatabaseConfig();
        $config->setEnv('env_test.php');
        $database = new DatabaseStructureAdapter($config->getConfig());
        $serviceReservation = new ServiceReservationRepository($database);
        $serviceReservationRepository = new InMemoryServiceReservationRepository($serviceReservation);
        $allReservation = $serviceReservationRepository->findAll(['id' => 1])[0];
        $reservation = [
            'id' => 1,
            'date_reservation' => "2000-01-01",
            'timezone' => 'Europe/Paris',
            'hours' => "[6, 30]"
        ];
        expect($allReservation)->toMatchArray($reservation);
    });

    it("service insert a reservation", function() {
        $config = new DatabaseConfig();
        $config->setEnv('env_test.php');
        $database = new DatabaseStructureAdapter($config->getConfig());
        $serviceReservation = new ServiceReservationRepository($database);
        $serviceReservationRepository = new InMemoryServiceReservationRepository($serviceReservation);
        $serviceReservationRepository->insert([
            'date_reservation' => "2024-12-08",
            'timezone' => 'Europe/Paris',
            'hours' => "[16,30]"
        ]);

        expect(true)->toBe(true);
    });
    
});

