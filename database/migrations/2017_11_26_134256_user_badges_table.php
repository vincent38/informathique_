<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UserBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_badges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->index();
            $table->integer('id_badge')->index();
            $table->timestamps();
        });
        DB::table('user_badges')->insert(
            array(
                'id' => 1,
                'id_user' => 1,
                'id_badge' => 1,
                'created_at' => DB::raw('now()'),
                'updated_at' => DB::raw('now()')
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_badges');
    }
}
