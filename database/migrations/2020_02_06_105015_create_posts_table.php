<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     * 执行命令
     *
     * @return void
     */
    public function up()
    {/* 
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        }); */
        
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 1406)->default("");
            $table->text('content');
            $table->integer('user_id')->default(0);
            $table->timestamps();
/* 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps(); */
        });
    }

    /**
     * Reverse the migrations.
     * 回滚命令
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
