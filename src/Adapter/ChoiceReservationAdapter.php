<?php 

namespace Src\Adapter;
use Src\Port\ChoiceReservationPortInterface;
use Src\Domain\Model\ChoiceReservation;

class ChoiceReservationAdapter implements ChoiceReservationPortInterface
{

    public function __construct(
        private ChoiceReservation $choiceReservation
    ){}

    /**
     * @param $format
     * @return string
     */
    public function createDateReservation($format = 'Y-m-d H:i:s'): string
    {
        $date = \DateTimeImmutable::createFromFormat('d/m/Y', $this->choiceReservation->getDateCalendar()->format('d/m/Y'));

        $date->setTimezone(new \DateTimeZone($this->choiceReservation->getTimezone()));
        [$hour, $minute] = $this->choiceReservation->getHours();
        $date->setTime($hour, $minute);
        return $date->format($format);
    }
}