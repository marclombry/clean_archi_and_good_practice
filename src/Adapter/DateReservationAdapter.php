<?php 
namespace Src\Adapter;

use Src\Port\DateReservationPortInterface;
use Src\Port\ChoiceReservationPortInterface;

class DateReservationAdapter
{

    public function __construct(protected ChoiceReservationPortInterface $choiceReservation){}

    public function createDateReservation(): string
    {
        return $this->choiceReservation->createDateReservation();
    }
}