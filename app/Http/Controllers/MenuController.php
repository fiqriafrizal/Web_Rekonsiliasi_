<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function information(){
        return view('informasi');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }




}
