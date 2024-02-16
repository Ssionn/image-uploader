<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryFile;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('avatars/tmp/' . $folder, $filename, ['disk' => 'public']);

            TemporaryFile::create([
                'filename' => $filename,
                'folder' => $folder,
            ]);

            return $folder;
        }
        return '';
    }
}
