<?php

namespace App\Http\Controllers;

use App\Repository\ImageRepository;

class DisplayController extends Controller
{
    public function __construct(
        protected ImageRepository $imageRepository
    ) {
    }

    public function index()
    {
        $images = $this->imageRepository->displayImagesAsStrings();
        $actualImages = $this->imageRepository->displayImagesAsImages();

        return view('image-index', compact('images', 'actualImages'));
    }

    public function delete($folder)
    {
        $this->imageRepository->deleteImage($folder);

        return redirect()->route('image-index');
    }
}
