<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\account;
use App\Models\FilesManage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;  //存Session (方法二)

class LoginController extends Controller
{
    public function login(Request $request)
    {
      
        $acc = $request->input('acc');
        $pw = $request->input('pw');

        $user = [
            'account' => $acc,
            'password' => $pw,
        ];

        if (Auth::attempt($user)) {

            $admin = Auth::user(); // 獲取登入成功的使用者資料
            $FilesManage = FilesManage::select('path', 'filename')->where("file_id", $admin->file_id)->first();
            $Path = $FilesManage->path .'/'.$FilesManage->filename;
            // Session::put('user', ['name' => 'John', 'email' => 'john@example.com']);  //存Session (方法二)

            $request->session()->put('account_img', $admin->Path);
            return  redirect('admin/overview');

            // return  view('admin/overview',['account_id','img/user.jpg']);
            // return view('admin/overview');
        } else {
            return back()->with('error_message', '系統錯誤')->withInput();
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $account = account::first();
        dd($account);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
