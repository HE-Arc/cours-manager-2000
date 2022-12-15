<?php

namespace App\Models;

enum Day: int
{
    case MONDAY = 1;
    case TUESDAY = 2;
    case WEDNESDAY = 3;
    case THURSDAY = 4;
    case FRIDAY = 5;
    case SATURDAY = 6;

    public function stringDay(): string
    {
        return match ($this) {
            Day::MONDAY => "Lundi",
            Day::TUESDAY => "Mardi",
            Day::WEDNESDAY => "Mercredi",
            Day::THURSDAY => "Jeudi",
            Day::FRIDAY => "Vendredi",
            Day::SATURDAY => "Samedi",
        };
    }

    public static function businessDays()
    {
        return [
            Day::MONDAY,
            Day::TUESDAY,
            Day::WEDNESDAY,
            Day::THURSDAY,
            Day::FRIDAY,
        ];
    }
}
