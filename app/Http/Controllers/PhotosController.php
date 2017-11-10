<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Photo;
use App\Gallery;

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

    public function store (Request $request, $gallery_id) {

        $request->validate(
            [
                'url' => 'required | url '
            ]
        );

        $gallery = Gallery::find($gallery_id);

        Photo::create([
            'url' => $request->input('url'),
            'gallery_id' => $gallery->id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('single-gallery', ['id' => $gallery_id]);

    }

     public function update(Request $request, $id)
    {

        $photo = Photo::find($id);

        $photo->url = $request->input('url');
       
        $photo->save();
       
        return redirect('/');
    }


}
