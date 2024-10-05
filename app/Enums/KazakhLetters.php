<?php

namespace App\Enums;

enum KazakhLetters: string
{
    case A = 'А';
    case A_Upper = 'Ә';
    case B = 'Б';
    case V = 'В';
    case G = 'Г';
    case G_Upper = 'Ғ';
    case D = 'Д';
    case E = 'Е';
    case YO = 'Ё';
    case ZH = 'Ж';
    case Z = 'З';
    case I = 'И';
    case I_Upper = 'Й';
    case K = 'К';
    case K_Upper = 'Қ';
    case L = 'Л';
    case M = 'М';
    case N = 'Н';
    case N_Upper = 'Ң';
    case O = 'О';
    case O_Upper = 'Ө';
    case P = 'П';
    case R = 'Р';
    case S = 'С';
    case T = 'Т';
    case U = 'У';
    case U_Upper = 'Ұ';
    case U_Upper_Two = 'Ү';
    case F = 'Ф';
    case H = 'Х';
    case H_Upper = 'Һ';
    case C = 'Ц';
    case CH = 'Ч';
    case SH = 'Ш';
    case SHC = 'Щ';
    case HARD = 'Ъ';
    case Y = 'Ы';
    case Y_Upper = 'І';
    case SOFT = 'Ь';
    case E_Upper_II = 'Э';
    case Y_Upper_II = 'Ю';
    case YA = 'Я';

    public static function getLettersArray(): array
    {
        $letters = [];
        foreach (self::cases() as $index => $letter) {
            $letters[$index] = $letter->value;
        }
        return $letters;
    }
}
