<?php

namespace App\Enums;

enum SubjectTypes:string
{
    case LETTER = 'letter';
    case WORD = 'word';
    case NUMBER = 'number';

    public static function getSubjects(): array
    {
        $subjects = [];
        foreach (self::cases() as $index => $subject) {
            $subjects[$index] = $subject->value;
        }
        return $subjects;
    }

    public static function getSubjectsWithTranslations(): array
    {
        return [
            self::LETTER->value => 'Әріп',
            self::WORD->value => 'Сөз',
            self::NUMBER->value => 'Сан',
        ];
    }

    public static function translate(string $value): string
    {
        return match ($value) {
            self::LETTER->value => 'Әріп',
            self::WORD->value => 'Сөз',
            self::NUMBER->value => 'Сан',
            default => 'Unknown',
        };
    }
}
