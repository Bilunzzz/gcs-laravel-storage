<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class FileUploadController extends Controller
{
    public function index()
    {
        return Inertia::render('FileStorage');
    }

    public function upload(Request $request)
{
    $request->validate([
        'file' => 'required|file|max:10240',
    ]);

    $file = $request->file('file');
    $filePath = 'uploads/' . $file->getClientOriginalName();

    $uploaded = Storage::disk('gcs')->put($filePath, file_get_contents($file));

    if (!$uploaded) {
        return back()->with('error', 'Gagal upload');
    }

    $fileUrl = Storage::disk('gcs')->url($filePath);

    return back()->with('success', 'File berhasil diunggah!')->with('fileUrl', $fileUrl);
}

}
