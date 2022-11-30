<?php

namespace App\Models;

enum Day: int
{
    case MONDAY = 1;
    case THUESDAY = 2;
    case WEDNESDAY = 3;
    case THURSDAY = 4;
    case FRIDAY = 5;
    case SATURDAY = 6;
    case SUNDAY = 7;

    public function stringDay(): string
    {
        return match ($this) {
            Day::MONDAY => "Lundi",
            Day::THUESDAY => "Mardi",
            Day::WEDNESDAY => "Mercredi",
            Day::THURSDAY => "Jeudi",
            Day::FRIDAY => "Vendredi",
            Day::SATURDAY => "Samedi",
            Day::SUNDAY => "Dimanche",
        };
    }

    public static function buisnessDays()
    {
        return [
            Day::MONDAY,
            Day::THUESDAY,
            Day::WEDNESDAY,
            Day::THURSDAY,
            Day::FRIDAY,
        ];
    }
}
