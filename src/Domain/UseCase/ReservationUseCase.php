<?php

namespace Src\Domain\UseCase;

use Src\Domain\Model\ChoiceReservation;
use Src\Port\InMemoryPortInterface;
use Src\Shared\Tool\FileSystem;

class ReservationUseCase
{
    private string $choiceReservation;


    public function getChoiceReservation(): string
    {
        return $this->choiceReservation;
    }


    public function setChoiceReservation(string $choiceReservation): static
    {
        $this->choiceReservation = $choiceReservation;
        return $this;
    }

    public function readAReservation(): array
    {
        return [
            'date_reservation' => $this->getChoiceReservation()
        ];
    }

    public function takeAReservation(string $dateCalendar, InMemoryPortInterface $inMemoryPort): array
    {

        $date = $this->setChoiceReservation($dateCalendar)->getChoiceReservation();
        $real_path = realpath('src').'/Data/reservation.txt';
        //$filesystem = new FileSystem();
        //$filesystem->save($real_path, $date);
        $inMemoryPort->save($real_path, $date);

        return [
            'date_reservation' => $date,
        ];
    }

}