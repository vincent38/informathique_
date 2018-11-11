<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
        /**DB::table('user_lvl')->insert(
            array(
                'id' => 1,
                'id_user' => 1,
                'exp' => 10,
                'lvl' => 1,
                'exp_sum' => 10
            )
        );*/
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
