<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $akun = $request->only('email','password');

        if(Auth::attempt($akun)){
            return redirect('/home');
        }

        else {
            // return redirect('/');
            echo "wrong email or password";
            
        }
        
    }

    public function register(){
        return view("register");
    }

    public function registerProcess(Request $request){
        // dd($request->all());

        $request->validate([
            'username' => 'required||max:255',
            'email' => 'required||email:rfc,dns||',
            'password' => 'required',
            'terms' => 'accepted','password',
        ]);

        $user = User::create([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->save();
        $request->session()->put('status', 'register successfully');
        return redirect('/');

    }
}
