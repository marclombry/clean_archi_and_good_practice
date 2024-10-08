<?php

use Src\Shared\ContainerDependencyInjection;

test("Dependency injection", function(){
    $container = new ContainerDependencyInjection();
    $container->add(['ReservationUseCase' => 'ChoiceReservation']);
    $container->add(['ReservationPresenter' => 'Presenter']);
    expect($container->get())->toBeArray();
    /*
    expect($container->get()[0])->toBe([
        'ReservationUseCase' => 'ChoiceReservation'
    ]);

    expect($container->factory())->toBe([
       'ReservationUseCase' => new \Src\Domain\UseCase\ReservationUseCase()
    ]);
    */
    var_dump($container->factory());
});

/*
'parameter' => [
    'usecase' => [
        'Src\Domain\UseCase\ReservationUseCase',
        'Src\Domain\Model\ChoiceReservation'
    ],
    'presenter' => 'Src\Port\Presenter\Reservation\ReservationPresenter'
*/