<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutAdminController extends Controller
{
    public function Index()
    {

        return view('admin.about.index');
    }

    public function Form()
    {
        return view('admin.about.add');
    }
    public function Store(request $request)
    {
        $request->validate(
            [
                "name" => "required | max:10 ",
                "lname" => "required | min:4",
                "content" => "required",
            ],
            [
                "name.required" => "ກະລຸນາປ້ອນຊື່",
                "name.max" => "ຊື່ ບໍ່ຄວນຫລາຍກວ່າ 10 ຕົວອັກສອນ",
                "lname.required" => "ກະລຸນາປ້ອນ ນາມສະກຸນ",
                "lname.min" => "ນາມສະກຸນ ຕ້ອງຫຼາຍກວ່າ 4 ຕົວອັກສອນ",
                "content.required" => "ກະລຸນາປ້ອ",


            ]
        );
    }
}
