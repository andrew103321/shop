<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class FilesManage extends Authenticatable
{
    use HasFactory;

    // 定義表名（如果與模型名稱不同）
    protected $table = 'files_manage';

    //定義哪些欄位可以被批量賦值
    protected $fillable = ['file_id', 'path', 'filename'];
    
    // 禁用自動時間戳
    public $timestamps = false;
}
