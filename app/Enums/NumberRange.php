<?php

namespace App\Enums;

enum NumberRange: string
{
    case SINGLE_DIGIT = 'single_digit';
    case DOUBLE_DIGIT = 'double_digit';
    case TRIPLE_DIGIT = 'triple_digit';

    public static function getNumberRanges(): array
    {
        $numberRanges = [];
        foreach (self::cases() as $index => $numberRange) {
            $numberRanges[$index] = $numberRange->value;
        }
        return $numberRanges;
    }
}
