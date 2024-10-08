<?php

use Src\Adapter\AdapterPresenter;
use Src\Domain\Model\ChoiceReservation;
use Src\Domain\UseCase\ReservationUseCase;
use Src\Port\Presenter\PresenterViewInterface;
use Src\Port\Presenter\reservation\ReservationPresenter;
use Src\UI\Presenter\TemplatePresenter;

describe("when user is on the index page", function() {
    it("user is on index", function(){
        $presenter = createReservation();
        expect($presenter['Presenter'])->toHaveMethods(['view']);
    });

    it('user is on reservation page', function(){
        $presenter = createReservation();
        expect($presenter['Template'])->toBeString();


    });
});

function createReservation()
{
    $choiceReservation = new ChoiceReservation(
        new DateTimeImmutable('now'),
        time(),
        [6,50]
    );
    $useCase = new ReservationUseCase($choiceReservation);
    $template = 'Reservation/reservation.view.php';
    $reservationPresenter = new ReservationPresenter($useCase,$template);
    $presenter = new AdapterPresenter($reservationPresenter);
    return [
      'ReservationUseCase' => $useCase,
      'Template' => $template,
      'ReservationPresenter' => $reservationPresenter,
      'Presenter' => $presenter
    ];
}
