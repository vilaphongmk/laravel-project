<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class AdminRoleController extends Controller
{
    public function Index()
    {
        $users = User::all();
        return view('role.index', compact('users'));
    }
    public function FormUpdate(Request $request)
    {
        $user = User::find($request->slug);
        return view('role.update', compact('user'));
    }

    public function Update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required|numeric',
                'role' => 'required',
                'status' => 'required',
                'slug' => 'required',
            ],
            [
                'name.required' => "ກະລຸນາປ້ອນຊື່",
                'phone.required' => "ກະລຸນາປ້ອນເບີໂທລະສັບ",
                'phone.numeric' => "ກະລຸນາປ້ອນເປັນຕົວເລກເທົ່ານັ້ນ",

                'role.required' => "ກະລຸນາ ເລືອກສີດການໃຊ້ງານ",
                'status.required' => "ກະລຸນາ ເລືອກສະຸຖານະ",
                'slug.required' => "ບໍ່ພົບຂໍ້ມູນອ້າງອີງ",
            ]
        );
        User::find($request->slug)->update([

            'name' => trim($request->name),
            'phone' => trim($request->phone),
            'role' => trim($request->role),
            'status' => trim($request->status),
        ]);
        return redirect()->route('role')->with('status', 'ອັບເດດຂໍ້ມູນສຳເລັດ');
    }
    public function Delete(Request $request)
    {
        $id = $request->id;
        if ($id) {
            User::find($id)->delete();
            return back()->with('success', 'ຂໍ້ມູນຖືກລົບ ສຳເລັດແລ້ວ');
        } else {
            return back()->with('error', 'ລົບຂໍ້ມູນບໍ່ສຳເລັດ');
        }
    }
    public function DeleteAjax(Request $request)
    {
        $id = $request->id;
        if ($id) {
            User::find($id)->delete();
            $status = 'success|ຂໍ້ມູນຖືກລົບ ສຳເລັດແລ້ວ';
            return response()->json($status);
        } else {
            $status = 'error|]ລົບຂໍ້ມູນ ບໍ່ສຳເລັດ';
            return response()->json($status);
        }
    }
}
