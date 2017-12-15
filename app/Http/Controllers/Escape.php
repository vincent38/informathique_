<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Escape extends Controller
{
    function index(Request $request) {
        $myId = $request->route('id', 0);
        if (Auth::check()) {
            $user = Auth::user();
            $uuid = DB::select('select uuid from user_uuid where id_user = ?', [$user->id]);
        } else {
            $user = -1;
            $uuid = "user-not-logged-in";
        }
        return view('escape',compact('myId', 'user', 'uuid'));
    }

    function finish(Request $request) {
        /*
        * Fin jeu informatique - callback de traitement des résultats
        * Get : id_user, uuid, token_laravel, formatted_id, lvl_exercice, nb_etapes
        * Op : Add experience to user table if not exists, or update if better
        * Op : Add level to user with levelling up if useful ONLY IF DONE OR UPDATED
        * Op : Add badge if eligible
        * Return : new exp, lvl, score, badge
        */
        /*$validatedData = $request->validate([
            'id' => 'required',
            'uuid' => 'required',
            'id_exo' => 'required',
            'lvl_exercice' => 'required',
            'nb_etapes' => 'required'
        ]);*/
        
        $exists = DB::select('select * from user_info where id_user = ? and id_exercise = ?', [$request->route('id'), $request->route('id_exo')]);
        var_dump($exists);
        if ($exists != null) {
            //Score déjà présent... Mettre à jour ?
            echo "Already in database... Checking if in hand better\n";

        } else {
            //Score non présent, ajout
            echo "Not in database, adding...\n";
            $score = 100; //TODO : Score calculation
            DB::table('user_info')->insert([
                'id_user' => $request->route('id'),
                'id_exercise' => $request->route('id_exo'),
                'lvl_exercise' => $request->route('lvl_exercice'),
                'score' => $score,
                'created_at' => 'NOW()',
                'updated_at' => 'NOW()'
            ])
        }
        return "ok";
    }
}
