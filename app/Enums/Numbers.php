<?php

namespace App\Enums;

enum Numbers: int
{
    case Zero = 0;
    case One = 1;
    case Two = 2;
    case Three = 3;
    case Four = 4;
    case Five = 5;
    case Six = 6;
    case Seven = 7;
    case Eight = 8;
    case Nine = 9;

    case Ten = 10;
    case Twenty = 20;
    case Thirty = 30;
    case Forty = 40;
    case Fifty = 50;
    case Sixty = 60;
    case Seventy = 70;
    case Eighty = 80;
    case Ninety = 90;

    case OneHundred = 100;
    case OneThousand = 1000;

    public static function getNumbersArray(): array
    {
        $numbers = [];
        foreach (self::cases() as $index => $number) {
            $numbers[$index] = $number->value;
        }
        return $numbers;
    }
}
