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
        
        $request->validate(
            [
                'name' => 'required | max: 255',
                'description' => 'max: 1000 '
            ]
        );

        $gallery = Gallery::with('photos')->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('galleries');
    }

    public function create(){
        return view('galleries.create');
    }

    public function edit($id)
    {
        $gallery = Gallery::with('photos')->find($id);
        
        return view('galleries.edit', compact('gallery','id'));

    }


    public function update(Request $request, $id)
    {

        $gallery = Gallery::with('photos')->find($id);

        $gallery->name = $request->input('name');
        $gallery->description = $request->input('description');
        $gallery->photos()->url = $request->input('url');

        $gallery->save();
       
        return redirect('/');
    }

    public function destroy($id)
    {

        $gallery =  Gallery::find($id);

        $gallery->delete();

        return redirect('/');
    }

    public function getGalleriesByUser($id){

        $galleries = Gallery::where('user_id', '=', $id)->get();

        return view('galleries.author', compact('galleries'));
    }
}
