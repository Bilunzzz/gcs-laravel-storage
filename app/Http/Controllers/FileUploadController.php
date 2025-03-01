<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // Max 10MB
        ]);

        $file = $request->file('file');
        $filePath = 'uploads/' . $file->getClientOriginalName();

        // Simpan ke Google Cloud Storage
        Storage::disk('gcs')->put($filePath, file_get_contents($file));

        // Dapatkan URL file
        $fileUrl = Storage::disk('gcs')->url($filePath);

        return back()->with('success', 'File berhasil diunggah!')->with('fileUrl', $fileUrl);
    }
}
