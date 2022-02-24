<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdatAdminController extends Controller
{
    public function Update()
    {
        return view('user.home.update');
    }
}
