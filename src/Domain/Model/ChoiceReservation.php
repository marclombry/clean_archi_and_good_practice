<?php

namespace Src\Domain\Model;

class ChoiceReservation
{
    public function __construct(
        private \DateTimeImmutable $dateCalendar,
        private string $timezone,
        private array $hours
    ){}

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     */
    public function setTimezone(string $timezone): void
    {
        $this->timezone = $timezone;
    }

    /**
     * @return string
     */
    public function getHours(): array
    {
        return $this->hours;
    }

    /**
     * @param string $hours
     */
    public function setHour(array $hours): void
    {
        $this->hours = $hours;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateCalendar(): \DateTimeImmutable
    {
        return $this->dateCalendar;
    }

    /**
     * @param \DateTimeImmutable $dateCalendar
     */
    public function setDateCalendar(\DateTimeImmutable $dateCalendar): void
    {
        $this->dateCalendar = $dateCalendar;
    }


}