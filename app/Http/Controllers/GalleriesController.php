<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index () {

        $galleries = Gallery::all();

        return view('galleries.index', compact('galleries'));

    }

    public function show($id) {

        $gallery = Gallery::with('photos', 'comments.user')->find($id);

        return view('galleries.show', compact('gallery'));
        
    }

    public function store(Request $request){ 
        //$request->validate(Gallery::STORE_RULES);
        $gallery = Gallery::create($request->all());
        return redirect()->route('homepage');
    }

    public function create(){
        return view('galleries.create');
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::with('photos', 'comments.user')->find($id);

        $gallery->name = $request->input('name');
        $gallery->director = $request->input('description');

        $gallery->update();
       
        return $gallery;

    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        $gallery->delete();
        
        return view('galleries.delete', compact('gallery'));
    }
}
