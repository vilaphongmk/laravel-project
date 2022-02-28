<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\book;

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

        try {
            $book = new book();
            $book->name = $request->name;
            $book->lname = $request->Author;
            $book->content = $request->content;
            $book->save();
            return redirect()->route('admin.about')->with('success', 'ບັນທຶກຂໍ້ມູນແລ້ວ');
        } catch (\Throwable $th) {
            return redirect()->route('admin.about.form')->with('error', 'ຜີດພາດ');
        }
    }
}
