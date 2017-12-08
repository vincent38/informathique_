<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lvl', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->index();
            $table->integer('exp');
            $table->integer('lvl');
            $table->integer('exp_sum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_lvl');
    }
}
