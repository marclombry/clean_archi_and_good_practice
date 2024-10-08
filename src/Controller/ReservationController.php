<?php

namespace Src\Controller;

use Src\Adapter\InMemoryMysqlAdapter;
use Src\Config\DatabaseConfig;
use Src\Domain\UseCase\ReservationUseCase;
use Src\Infrastructure\Database\DatabaseStructureAdapter;
use Src\Infrastructure\Repository\ServiceReservationRepository;
use Src\Port\Presenter\PresenterViewInterface;
use Src\Shared\Tool\FileSystem;


class ReservationController
{

    public function __construct(
        private ReservationUseCase $createReservationUseCase,
        private PresenterViewInterface $presenter)
    {}

    public function create()
    {
        if(!isset($_POST) || $_POST == [])
        {
            header("Location: /error");
            exit();
        }
        $dateCalendar = htmlspecialchars($_POST['DateCalendar']);
        $date = date($dateCalendar);
        $config = new DatabaseConfig();
        $config->setEnv('env_test.php');
        $datastructure = new DatabaseStructureAdapter($config->getConfig());
        $repository = new ServiceReservationRepository($datastructure);
        //$real_path = realpath('src').'/Data/reservation.txt';
        //$filesystem = new FileSystem();
        $this->createReservationUseCase->takeAReservation($date, $repository);
        $this->presenter->view('Reservation/reservation');

    }

    public function update(){}

    public function delete(){}

    public function index()
    {
        $this->presenter->view('Reservation/index');
    }
}