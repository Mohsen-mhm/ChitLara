<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadController extends Controller
{
    public function download(Request $request): BinaryFileResponse
    {
        $path = $request->input('path');
        $name = $request->input('name');

        $file = public_path('storage/' . $path . '/' . $name);
        $fileExtension = pathinfo($name, PATHINFO_EXTENSION);

        $fileName = env('APP_NAME') . '_' . date('Y_m_d') . '_' . uniqid() . '.' . $fileExtension;

        return response()->download($file, $fileName);
    }
}
