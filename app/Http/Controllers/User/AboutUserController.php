<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUserController extends Controller
{
    public function Index()
    {

        return view('user.about.index');
    }
    public function Home()
    {
        return view('user.home.index');
    }
}
