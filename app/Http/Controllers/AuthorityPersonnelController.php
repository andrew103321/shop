<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\account;
use App\Models\FilesManage;
use Illuminate\Support\Facades\Validator; // 表單驗證 (方法二)
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;


class AuthorityPersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(request $request)
    {

        // 表單驗證 (方法一)
        $request->validate([
            'name' => 'required|string|max:255',
            'account' => 'required|string|max:255|unique:account,account', // 確保帳號唯一
            'repassword' => 'required|string|min:6|same:password', // 使用 same 驗證 password 和 repassword
            'password' => 'required|string|min:6',
            'remark' => 'nullable|string|max:500', // 備註是選填
            'file' => 'required|file|mimes:jpeg,png|max:2048', // 檔案必填，限制格式為 jpeg, png，大小最大 2MB
        ]);


        try {
            $account = new account;
            $FilesManage = new FilesManage;
            // isValid()   方法的用途
            // 返回 true： 如果上傳的檔案有效，沒有錯誤。
            // 返回 false：如果檔案在上傳過程中出現了錯誤或無效。：
            if ($request->hasFile('file') && $request->file('file')->isValid()) {
              
                try {
                    // 使用 Intervention Image 處理圖像
                    $path = 'public/image_account';
                    $file = $request->file('file');
                    $filetype = $request->file('file')->getClientmimeType();
                    $image = Image::make($file);

                    if ($filetype == "image/png") {
                        $img_type = ".png";
                    } else {
                        $img_type = ".jpg";
                    }

                    //寫法1 storeAs 只能存在Storage 資料夾下
                    $request->file('file')->storeAs($path, time().$img_type);

                    $FilesManage->path = $path;
                    $FilesManage->filename = time().$img_type;
                    $FilesManage->save();

                    $newId = $FilesManage->id; // 獲取新增的流水 ID
                 
                } catch (\Exception $e) {
                    return back()->with('error_message', '系統錯誤' . $e->getMessage())->withInput();
                }
            }



            $account->name = $request->name;
            $account->account = $request->account;
            $account->password =   Hash::make($request->password);
            $account->password_unencrypt =  $request->password;
            $account->remark = $request->remark;
            $account->file_id =   $newId;
            $account->createtime = time();
            $account->lasttime = time();
            $account->save();

            return redirect('admin/authority_personnel')->with('success_message', '新增成功');
        } catch (\Exception $e) {
            return back()->with('error_message', '系統錯誤' . $e->getMessage())->withInput();
        }


        // 表單驗證 (方法二)
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'account' => 'required|string|max:255|unique:accounts,account', // 確保帳號唯一
        //     'password' => 'required|string|min:6|confirmed', // 使用 confirmed 來自動比對 password 和 repassword
        //     'remark' => 'nullable|string|max:500', // 備註是選填
        // ]);

        // if ($validator->fails()) {
        //     // $errors = $validator->errors()->first();
        //     $errors = $validator->errors();
        //     return back()->withinput($request->input())->withErrors($errors);
        // }

        //自訂翻譯
        // return redirect('admin/authority_personnel')->with('success_message', __('admin.ads.created'));


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
    // public function store(Request $request)
    // {
    //     //
    // }

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
