<?php

namespace App\Helper;

use Illuminate\Support\Facades\View;

class Helper
{
    // Helper function to generate avatar
    public static function generateAvatar($username, $avatarUrl = null): string
    {
        $firstCharacter = strtoupper(substr($username, 0, 1));

        if ($avatarUrl) {
            return '<img style="min-height: 2.5rem; min-width: 2.5rem;" src="' . $avatarUrl . '" alt="' . $username . '" class="rounded-full h-10 w-10 min-h-10 min-w-10">';
        } else {
            $randomColor = self::generateRandomColor();
            return '<div style="min-height: 2.5rem; min-width: 2.5rem; background-color: ' . $randomColor . ';" class="rounded-full h-10 w-10 min-h-10 min-w-10 flex items-center justify-center text-white text-xl font-bold">' . $firstCharacter . '</div>';
        }
    }

    // Helper function to generate a random color
    public static function generateRandomColor(): string
    {
        $red = mt_rand(80, 200);
        $green = mt_rand(80, 200);
        $blue = mt_rand(80, 200);
        // Convert RGB values to hexadecimal format
        return sprintf('#%02X%02X%02X', $red, $green, $blue);
    }

    public static function setActiveBoxSession(string $uuid, string $type): string
    {
        session()->put('active_box', [
            'id' => $uuid,
            'type' => $type
        ]);

        return View::make('components.active-box')->render();
    }
}
