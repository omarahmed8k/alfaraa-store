<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class ImageEditorController extends Controller
{
    public function index()
    {
        return view('front.image-editor');
    }
}
