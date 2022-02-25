<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutAdminController extends Controller
{
    public function about()
    {
        $fname = "Phong";
        return view('user.about.about', compact('fname'));
    }
}
