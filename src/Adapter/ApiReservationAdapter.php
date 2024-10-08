<?php 
namespace Src\Adapter;
use Src\Port\ChoiceReservationPortInterface;

class ApiReservationAdapter implements ChoiceReservationPortInterface 
{
    public function createDateReservation($format = "d/m/Y") :string
    {
        return date($format);
    }
}