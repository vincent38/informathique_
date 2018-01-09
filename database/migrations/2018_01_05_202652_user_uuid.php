<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class UserUuid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_uuid', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->string('uuid');
        });
        DB::table('user_uuid')->insert(
            array(
                'id' => 1,
                'id_user' => 1,
                'uuid' => Uuid::generate(5, 1, Uuid::NS_DNS)->string
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
        //
    }
}
