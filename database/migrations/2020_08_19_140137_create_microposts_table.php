<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicropostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microposts', function (Blueprint $table) {
            $table->increments('id');
            //idは負の数は許可しない　検索速度をあげる
            $table->integer('user_id')->unsigned()->index();
            $table->string('content');
            $table->timestamps();
            
            //外部キー制約
            // user_idカラムの外部キー設定する->制約先のIDはid->外部キー制約先のテーブルはusers
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('microposts');
    }
}
