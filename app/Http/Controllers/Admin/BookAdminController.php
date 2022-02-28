<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookAdminController extends Controller
{

    public function Book()
    {
        return view("admin.about.book");
    }
    public function BookStore(request $request)
    {
        $request->validate(
            [
                "name" => "required | max:10 ",
                "Author" => "required | min:4",
                "content" => "required",
            ],
            [
                "name.required" => "ກະລຸນາປ້ອນຊື່",
                "name.max" => "ຊື່ ບໍ່ຄວນຫລາຍກວ່າ 10 ຕົວອັກສອນ",
                "Author.required" => "ກະລຸນາປ້ອນ ນາມສະກຸນ",
                "Author.min" => "ນາມສະກຸນ ຕ້ອງຫຼາຍກວ່າ 4 ຕົວອັກສອນ",
                "content.required" => "ກະລຸນາປ້ອ",


            ]
        );
    }
}
