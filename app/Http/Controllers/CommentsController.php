<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store (Request $request, $gallery_id) {

        $request->validate(
            [
                'content' => 'required | max:1000'
            ]
        );

        $gallery = Gallery::find($gallery_id);

        Comment::create([
            'content' => $request->get('content'),
            'gallery_id' => $gallery->id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('single-gallery', ['id' => $gallery_id]);

    }
}
