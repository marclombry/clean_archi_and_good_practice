<?php

use Src\Controller\ReservationController;
use Src\Domain\Model\ChoiceReservation;
use Src\Domain\UseCase\ReservationUseCase;
use Src\Port\Presenter\reservation\ReservationPresenter;

test("ReservationController should has command method", function() {
    $ReservationController = createReservationController();
    expect($ReservationController)->toHaveMethods(['create','update','delete']);
});


function createReservationController()
{
    $date = new \DateTimeImmutable('2000-01-01');
    $timezone = 'Europe/Paris';
    $hours = [6,30];
    $choiceReservation = new ChoiceReservation($date,$timezone,$hours);
    $reservationUseCase = new ReservationUseCase($choiceReservation);
    $presenterView = new ReservationPresenter($reservationUseCase,'Reservation/reservation');
    return new ReservationController($reservationUseCase, $presenterView);
}