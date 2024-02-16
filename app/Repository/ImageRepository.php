<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageRepository
{
    public function displayImagesAsStrings(): array
    {
        $images = DB::table('temporary_files')
            ->select('folder', 'filename')
            ->get();

        return $images->toArray();
    }

    public function displayImagesAsImages(): array
    {
        $images = DB::table('temporary_files')
            ->select('folder', 'filename')
            ->get();

        $imagesArray = [];

        foreach ($images as $image) {
            $imagesArray[] = [
                'folder' => $image->folder,
                'filename' => $image->filename,
                'path' => asset('storage/avatars/tmp/' . $image->folder . '/' . $image->filename),
            ];
        }

        return $imagesArray;
    }

    public function deleteImage(string $folder): void
    {
        DB::table('temporary_files')
            ->where('folder', $folder)
            ->delete();

        $this->deleteImageFromStorage($folder);
    }

    public function deleteImageFromStorage(string $folder): void
    {
        Storage::disk('public')->delete('avatars/tmp/' . $folder);
    }
}
