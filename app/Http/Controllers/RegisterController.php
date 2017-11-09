<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserVerification;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create () {

        return view('register.create');

    }

    public function store (Request $request) {

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required | email',
                'password' => 'required | confirmed:password_confirmation | min:8'
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();

        return redirect()->route('galleries');

    }
}
