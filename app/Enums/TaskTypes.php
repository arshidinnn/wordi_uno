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
}
