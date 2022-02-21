<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutAdminController extends Controller
{
    public function about()
    {
        return view('user.about.about');
    }
}
