<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth')->except(['showTop']);
    }

    public function showTop()
    {
        return view('/');
    }

     public function showHome()
    {
        return view('user.home');
    }

}
