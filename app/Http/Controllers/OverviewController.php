<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index(){
        // 這樣自己帶model 資料表資料
        $account_id = 4646545645;
        return view('admin.overview')->with('account_id',$account_id);
    }
}
