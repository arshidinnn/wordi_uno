<?php

namespace App\Enums;

use App\Enums\SubjectTypes;

enum ModeTypes: string
{
    case LETTER_EXPLORE = 'explore';
    case LETTER_FIND = 'find';
    case WORD_DICTATION = 'dictation';
    case WORD_PICTURE = 'picture';
    case WORD_MISSING = 'missing';
    case NUMBER_ADDITION = 'addition';
    case NUMBER_SUBTRACTION = 'subtraction';
    case NUMBER_MULTIPLICATION = 'multiplication';
    case NUMBER_DIVISION = 'division';

    public static function getModes(?string $subject = null): array
    {
        if (is_null($subject)) {
            return array_column(self::cases(), 'value');
        }

        if (!in_array($subject, SubjectTypes::getSubjects())) {
            throw new \InvalidArgumentException("Invalid subject: $subject");
        }

        $prefix = strtoupper($subject) . '_';

        return self::getModesByPrefix($prefix);
    }

    private static function getModesByPrefix(string $prefix): array
    {
        $modes = [];
        foreach (self::cases() as $case) {
            if (str_starts_with($case->name, $prefix)) {
                $modes[] = $case->value;
            }
        }

        return $modes;
    }

    public static function getModesWithTranslations(): array
    {
        return [
            self::LETTER_EXPLORE->value => 'Әріптерді зерттеу',
            self::LETTER_FIND->value => 'Әріпті табу',
            self::WORD_DICTATION->value => 'Диктант',
            self::WORD_PICTURE->value => 'Сурет бойынша сөз табу',
            self::WORD_MISSING->value => 'Жіберілген әріпті табу',
            self::NUMBER_ADDITION->value => 'Қосу',
            self::NUMBER_SUBTRACTION->value => 'Азайту',
            self::NUMBER_MULTIPLICATION->value => 'Көбейту',
            self::NUMBER_DIVISION->value => 'Бөлу',
        ];
    }

    public static function translate(string $value): string
    {
        return match ($value) {
            self::LETTER_EXPLORE->value => 'Әріптерді зерттеу',
            self::LETTER_FIND->value => 'Әріпті табу',
            self::WORD_DICTATION->value => 'Диктант',
            self::WORD_PICTURE->value => 'Сурет бойынша сөз табу',
            self::WORD_MISSING->value => 'Жіберілген әріпті табу',
            self::NUMBER_ADDITION->value => 'Қосу',
            self::NUMBER_SUBTRACTION->value => 'Азайту',
            self::NUMBER_MULTIPLICATION->value => 'Көбейту',
            self::NUMBER_DIVISION->value => 'Бөлу',
            default => 'Unknown', // значение по умолчанию, если передан несуществующий режим
        };
    }
}
