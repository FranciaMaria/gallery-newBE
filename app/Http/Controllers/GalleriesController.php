<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //$gallery = Gallery::create($request->all());
        //return redirect()->route('galleries');

        $gallery = Gallery::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('galleries');
    }

    public function create(){
        return view('galleries.create');
    }

    public function edit(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        
        return view('galleries.edit', compact('gallery','id'));

    }


    public function update(Request $request, $id)
    {

        $gallery = Gallery::with('photos')->find($id);

        $gallery->name = $request->get('name');
        $gallery->director = $request->get('description');
        $gallery->photos()->url = $request->get('url'); //ne verujem da ce proci

        $gallery->update();
       
        return $gallery;

    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        $gallery->delete();
        
        //return view('galleries.delete', compact('gallery'));

        return $gallery;
    }
}
