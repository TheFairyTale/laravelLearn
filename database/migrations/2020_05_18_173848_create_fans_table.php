<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 新建一个站点功能的流程
        // 1. 建立表迁移 -> php artisan make:migration 
        // 2. 根据迁移,生成表 -> php artisan migrate
        // 3. 生成模型 php artisan make:model 
        Schema::create('fans', function (Blueprint $table) {
            $table->increments('id');
            // fans id
            $table->integer('fan_id')->default(0);  
            // 被关注者 id
            $table->integer('star_id')->default(0);
            // create_at update_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fans');
    }
}
