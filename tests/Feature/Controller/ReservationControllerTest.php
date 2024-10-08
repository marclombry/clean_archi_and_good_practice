<?php

use Src\Controller\ReservationController;
use Src\Domain\Model\ChoiceReservation;
use Src\Domain\UseCase\ReservationUseCase;
use Src\Port\Presenter\reservation\ReservationPresenter;

describe("reservation controller should be return reservation page", function(){
   it("when a user in the reservation page", function(){
        $reservationController = reservationController();
        expect($reservationController)->not()->toBe(null);
   });
});

function reservationController()
{
    $date = (new \DateTime('now'))->format('d-m-Y:h:m:s');
    $reservationUseCase = new ReservationUseCase();
    $reservationUseCase->setChoiceReservation($date);
    $presenterView = new ReservationPresenter($reservationUseCase,'Reservation/reservation');
    return new ReservationController($reservationUseCase, $presenterView);
}