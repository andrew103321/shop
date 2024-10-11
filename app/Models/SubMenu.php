<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    // 指定自定義主鍵名稱
    protected $primaryKey = 'sub_menu_id';
}
