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

    public static function getNumberRangesWithTranslations(): array
    {
        return [
            self::SINGLE_DIGIT->value => 'Бір таңбалы сан',
            self::DOUBLE_DIGIT->value => 'Екі таңбалы сан',
            self::TRIPLE_DIGIT->value => 'Үш таңбалы сан',
        ];
    }
}
