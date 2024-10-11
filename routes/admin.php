<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthorityPersonnelController;
use App\Http\Controllers\OverviewController;

Route::get('/login', function () {
    return view('admin.login');
});


// Route::middleware(['admin', 'auth:admin'])->group(function () { 

    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/account', function () {
        return view('admin.account');
    });

    Route::get('/authority_personnel', function () {

        return view('admin.authority_personnel');
    })->name('admin.authority_personnel');

    Route::post('/authority_personnel', [AuthorityPersonnelController::class, 'store']);
    Route::post('/authority_personnel', [AuthorityPersonnelController::class, 'show']);

    Route::get('/overview', function () {
        return view('admin.overview');
    });
    
    // ↑上面的方法沒有錯，但你這樣無法帶資料進去渲染頁面，所以你要寫一個Controller 專屬的 function 去做帶資料渲染
    // Route::get('overview', [OverviewController::class, 'index']);

// });
