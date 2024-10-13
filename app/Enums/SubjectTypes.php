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
}
