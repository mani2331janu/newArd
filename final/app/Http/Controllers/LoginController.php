<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function home()
    {
        return view('main');
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            $email = $request->input('email');
            $pass = $request->input('password');


            if (Auth::attempt(['email' => $email, 'password' => $pass])) {
                $user = User::where('email', $email)->first();


                Auth::login($user);


                return redirect('/home')->with('success', 'Logged in successfully.');
            } else {

                return back()->withErrors(['login' => 'Invalid email or password.']);
            }
        } catch (\Exception $e) {

            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');

    }

    public function menu(){
        return view('menu');
    }

    public function add(){
        return view('form');
    }
}
