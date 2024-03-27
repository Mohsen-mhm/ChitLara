<?php

namespace App\Helper;

class Helper
{
    public static function generateAvatar($username, $avatarUrl = null): string
    {
        $firstCharacter = strtoupper(substr($username, 0, 1));
        $colors = ['bg-blue-500', 'bg-red-500', 'bg-green-500', 'bg-yellow-500', 'bg-indigo-500', 'bg-purple-500', 'bg-pink-500'];
        $darkColors = ['dark:bg-blue-500', 'dark:bg-red-500', 'dark:bg-green-500', 'dark:bg-yellow-500', 'dark:bg-indigo-500', 'dark:bg-purple-500', 'dark:bg-pink-500'];
        $randomColor = $colors[array_rand($colors)];
        $randomDarkColor = $darkColors[array_rand($darkColors)];

        if ($avatarUrl) {
            return '<img style="min-height: 2.5rem; min-width: 2.5rem;" src="' . $avatarUrl . '" alt="' . $username . '" class="rounded-full h-10 w-10 min-h-10 min-w-10">';
        } else {
            return '<div style="min-height: 2.5rem; min-width: 2.5rem;" class="rounded-full h-10 w-10 min-h-10 min-w-10 flex items-center justify-center text-white text-xl font-bold ' . $randomColor . ' ' . $randomDarkColor . '">' . $firstCharacter . '</div>';
        }
    }
}
