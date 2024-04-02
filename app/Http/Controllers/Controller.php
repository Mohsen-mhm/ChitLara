<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function response(bool $status, string $message = '', array $data = [], int $code = 200): object
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
