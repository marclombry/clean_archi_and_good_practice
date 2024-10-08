<?php

namespace Src\Shared;

use Src\Adapter\InMemoryMysqlAdapter;
use Src\Config\DatabaseConfig;
use Src\Domain\Model\UserServices;
use Src\Domain\UseCase\IndexUseCase;
use Src\Domain\UseCase\ReservationUseCase;
use Src\Domain\UseCase\UserServicesUseCase;
use Src\Infrastructure\Database\DatabaseStructureAdapter;
use Src\Infrastructure\Repository\UserServicesRepository;
use Src\Port\Presenter\IndexPresenter;
use Src\Port\Presenter\register\RegisterPresenter;
use Src\Port\Presenter\reservation\ReservationPresenter;

class ContainerDependencyInjection
{
    private array $container = [];

    public function get(): array
    {
        return $this->container;
    }

    public function add($array): void
    {
        if(!empty($array))
        {
            $this->container[] = $array;
        }
    }

    public function factory()
    {
        $config = new DatabaseConfig();
        $config->setEnv('env_test.php');
        $datastructure = new DatabaseStructureAdapter($config->getConfig());
        $userServicesRepository = new UserServicesRepository($datastructure);
        $reservationUseCase = new ReservationUseCase();
        $reservationPresenter = new ReservationPresenter($reservationUseCase,'Reservation/reservation');
        $indexUseCase = new IndexUseCase();
        $indexPresenter = new IndexPresenter();
        $user = new UserServices();
        $userServicesRepository = new InMemoryMysqlAdapter();
        $userServicesUseCase = new UserServicesUseCase();
        $registerPresenter = new RegisterPresenter($userServicesUseCase, 'Register/register');
        return [
            'ReservationUseCase' => $reservationUseCase,
            'ReservationPresenter' => $reservationPresenter,
            'IndexUseCase' => $indexUseCase,
            'IndexPresenter' => $indexPresenter,
            'UserServicesUseCase' => $userServicesUseCase,
            'RegisterPresenter' => $registerPresenter
        ];
    }
}