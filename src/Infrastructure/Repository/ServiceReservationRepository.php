<?php 

namespace Src\Infrastructure\Repository;

use Src\Infrastructure\Database\DatabaseStructureAdapter;
use Src\Port\InMemoryPortInterface;

class ServiceReservationRepository implements InMemoryPortInterface
{

    public function __construct(Private DatabaseStructureAdapter $database){}

    public function find($filter)
    {
        $this->database->setTable('reservation');
        $serviceReservation = $this->database->select($filter);

        return $serviceReservation;
    }

    public function findAll()
    {
        $this->database->setTable('reservation');
        $serviceReservation = $this->database->all();

        return $serviceReservation;
    }

    public function insert(array $data)
    {
        $this->database->setTable('reservation');
        $this->database->execute($data);
    }

    public function save(?string $path, string $data)
    {
        $date = ['date_reservation' => $data,'timezone' => 'chine','hours'=>'5'];
        $this->insert($date);
    }
}