<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show ($id) {

        $photo = Photo::find($id);

        return view('photos.show', compact('photo'));

    }
}
