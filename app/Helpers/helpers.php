<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

if (!function_exists('generateUniqueUsername')) {
    /**
     * Generate a unique username from firstname and lastname.
     *
     * @param string $firstname
     * @param string $lastname
     * @return string
     */
    function generateUniqueUsername(string $firstname, string $lastname): string
    {
        $transliterationMap = [
            'а' => 'a', 'ә' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'ғ' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e',
            'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'i', 'к' => 'k', 'қ' => 'q', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'ң' => 'n', 'о' => 'o', 'ө' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ұ' => 'u',
            'ү' => 'u', 'ф' => 'f', 'х' => 'kh', 'һ' => 'h', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y',
            'і' => 'i', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
        ];

        $firstname = mb_strtolower($firstname);
        $lastname = mb_strtolower($lastname);

        $firstname = preg_replace('/[^a-zа-яёәғқңөұүһі]/u', '', $firstname);
        $lastname = preg_replace('/[^a-zа-яёәғқңөұүһі]/u', '', $lastname);

        $firstname = strtr($firstname, $transliterationMap);
        $lastname = strtr($lastname, $transliterationMap);

        $username = Str::slug($lastname . "." . $firstname);

        $counter = 1;

        while (DB::table('users')->where('username', $username)->exists()) {
            $username = Str::slug($firstname . '.' . $lastname) . $counter;
            $counter++;
        }

        return $username;
    }
}

