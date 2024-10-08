<?php 
use Src\Domain\Model\ChoiceReservation;
use Src\Port\ChoiceReservationPortInterface;
use Src\Adapter\DateReservationAdapter;
use Src\Adapter\ChoiceReservationAdapter;
use Src\Adapter\ApiReservationAdapter;

test("port interface for create date reservation", function () {
    $date = new \DateTimeImmutable('2000-01-01');
    $timezone = 'Europe/Paris';
    $hours = [6,30];
    $choiceRecervation = new choiceReservation($date,$timezone,$hours);
    $choiceRecervationAdapter = new ChoiceReservationAdapter($choiceRecervation);
    $dateReservation = new DateReservationAdapter($choiceRecervationAdapter);
    expect($choiceRecervationAdapter)->toBeInstanceOf(ChoiceReservationPortInterface::class);
    expect($dateReservation)->toHaveMethods(['createDateReservation']);
    expect($dateReservation->createDateReservation())->toBeString();
});

it("date reservation", function(){
    $date = new \DateTimeImmutable('2000-01-01');
    $timezone = 'Europe/Paris';
    $hours = [6,30];
    $choiceRecervation = new choiceReservation($date,$timezone,$hours);
    $choiceRecervationAdapter = new ChoiceReservationAdapter($choiceRecervation);
    $dateReservation = new DateReservationAdapter($choiceRecervationAdapter);
    $reservation = $dateReservation->createDateReservation();
    expect($reservation)->toBeString();
});

it("api date reservation", function(){
    $apiReservation = new ApiReservationAdapter();
    $dateReservation = new DateReservationAdapter($apiReservation);
    $reservation = $dateReservation->createDateReservation();
    expect($reservation)->toBeString();
});