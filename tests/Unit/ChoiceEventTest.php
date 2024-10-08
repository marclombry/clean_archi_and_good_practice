<?php
use Src\Domain\Model\ChoiceReservation;

describe('when user chose event date for take a reservation', function(){
    it('user chose date availible', function() {
        $choiceReservationDate = new \DateTimeImmutable('now');
        expect($choiceReservationDate)->toBeInstanceOf(\DateTimeImmutable::class);
    });
    it('user chose timezone', function() {
        $date = new \DateTimeImmutable('2000-01-01');
        $timezone = 'Europe/Paris';
        $hours = [6,30];
        $choiceFormData = new ChoiceReservation($date, $timezone,$hours);
        $dateReservation = $choiceFormData->getTimezone();
        expect($dateReservation)->toBeString();
    });
    it('user enters a date before today\'s date', function() {
        $dateChoiceUser = createDate('2000-01-01');
        $dateNow =  createDate('now');
        if($dateChoiceUser < $dateNow) {
            throw new Exception('error, the reservation date must be greater than today\'s date');
        }
    })->throws(Exception::class);
});

function createDate($datetime)
{
    $date = new \DateTimeImmutable($datetime);
    $timezone = 'Europe/Paris';
    $hours = [6,30];
    $choiceFormData = new ChoiceReservation($date, $timezone,$hours);
    return $choiceFormData->getDateCalendar();
}