<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\book;
use PhpParser\Node\Stmt\TryCatch;

class AboutAdminController extends Controller
{
    public function Index()
    {
        // select data //
        $data = book::all();
        return view('admin.about.index', compact('data'));
    }

    public function Form()
    {
        return view('admin.about.add');
    }
    public function Store(request $request)
    {
        // ກວດສອບຂໍ້ມູນ
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
        // ປູ່ມກົດ
        try {
            $book = new book();
            $book->name = $request->name;
            $book->lname = $request->lname;
            $book->content = $request->content;
            $book->save();
            return redirect()->route('admin.about')->with('success', 'ບັນທຶກຂໍ້ມູນແລ້ວ');
        } catch (\Throwable $th) {
            return redirect()->route('admin.about.form')->with('error', 'ຜີດພາດ');
        }
    }
    public function Deletebook(request $request)
    {
        // dd($request->id);
        $del = book::where('id', '=', $request->id)->delete();
        if ($del) {
            return back()->with("success", "ຂໍ້ມູນຖືກລົບແລ້ວ");
        } else {
            return back()->with('erro', 'ຜີດພາດລອງອີກຄັ້ງ');
        }
    }
}
