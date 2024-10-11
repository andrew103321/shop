<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class account extends Authenticatable
{
    use HasFactory;

    // 定義表名（如果與模型名稱不同）
    protected $table = 'account';

    //定義哪些欄位可以被批量賦值
    protected $fillable = ['account_id', 'account', 'password', 'name', 'createtime', 'lasttime'];
    
    // 禁用自動時間戳
    public $timestamps = false;
}
