<?php 

namespace Src\Port;

interface ChoiceReservationPortInterface 
{
    public function createDateReservation($format = 'Y-m-d H:i:s'): string;
}