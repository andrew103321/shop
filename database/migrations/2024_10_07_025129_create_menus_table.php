<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('menu_id'); // 使用 menu_id 作為主鍵  
            $table->string('name'); // 品項名稱
            $table->string('file_id')->default(0); // 圖片連結
            $table->integer('order')->default(0); // 排序
            $table->integer('price')->default(0); // 價格
            $table->boolean('show')->default(true); // 是否顯示
            $table->timestamps();
        });

        Schema::create('sub_menus', function (Blueprint $table) {
            $table->bigIncrements('sub_menu_id'); // 使用 sub_menus_id 作為主鍵
            $table->unsignedBigInteger('menu_id'); // 外鍵參考 menus 表
            $table->string('name'); // 品項名稱
            $table->string('file_id')->default(0); // 圖片連結
            $table->integer('order')->default(0); // 排序
            $table->integer('price')->default(0); // 價格
            $table->boolean('show')->default(true); // 是否顯示
            $table->foreign('menu_id')->references('menu_id')->on('menus')->onDelete('cascade');         // 外鍵約束
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        // 然後刪除 sub_menus 表
        Schema::dropIfExists('sub_menus');

        // 然後刪除菜單表
        Schema::dropIfExists('menus');
    }
};
