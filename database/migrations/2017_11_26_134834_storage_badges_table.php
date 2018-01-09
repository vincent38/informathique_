<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class StorageBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_badges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('action');
            $table->integer('count_action');
            $table->string('data');
        });
        DB::table('storage_badges')->insert(
            array(
                'id' => 1,
                'name' => 'Bienvenue !',
                'action' => 'signin',
                'count_action' => 1,
                'data' => 'Bienvenue sur Kinimi :)'
            )
        );
        DB::table('storage_badges')->insert(
            array(
                'id' => 2,
                'name' => 'If door then go out',
                'action' => 'end_info_0',
                'count_action' => 1,
                'data' => 'Finir le didacticiel d\'escape colle.'
            )
        );
        DB::table('storage_badges')->insert(
            array(
                'id' => 3,
                'name' => 'Escape the geometrix',
                'action' => 'end_math_4',
                'count_action' => 1,
                'data' => 'Terminer l\'histoire \'Kimi dans la ville de Géométra\''
            )
        );
        DB::table('storage_badges')->insert(
            array(
                'id' => 4,
                'name' => 'Win and retry',
                'action' => 'improve_score_info',
                'count_action' => 1,
                'data' => 'Améliorer son score sur un niveau d\'escape colle'
            )
        );
        DB::table('storage_badges')->insert(
            array(
                'id' => 5,
                'name' => 'Première heure',
                'action' => 'end_info_1',
                'count_action' => 1,
                'data' => 'Finir le premier niveau d\'escape colle.'
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
        Schema::dropIfExists('storage_badges');
    }
}
