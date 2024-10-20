<?php

namespace App\Enums;

enum TaskTypes:string
{
    case LEARNING = 'learning';
    case TEST = 'test';

    public static function getTaskTypes(): array
    {
        $types = [];
        foreach (self::cases() as $index => $letter) {
            $types[$index] = $letter->value;
        }
        return $types;
    }

    public static function getTaskTypesWithTranslations(): array
    {
        return [
            self::LEARNING->value => 'Зерттеу',
            self::TEST->value => 'Бақылау',
        ];
    }

    public static function translate(string $value): string
    {
        return match ($value) {
            self::LEARNING->value => 'Зерттеу',
            self::TEST->value => 'Бақылау',
            default => 'Unknown',
        };
    }


}
