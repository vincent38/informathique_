<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Escape extends Controller
{
    function index(Request $request) {
        $myId = $request->route('id', 0);
        $user = Auth::user();
        $uuid = DB::select('select uuid from user_uuid where id_user = ?', [$user->id]);
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
        $validatedData = $request->validate([
            'id' => 'required',
            'uuid' => 'required',
            'id_exo' => 'required',
            'lvl_exercice' => 'required',
            'nb_etapes' => 'required'
        ]);
        
        $exists = DB::select('select * from user_info where id_user = ? and id_exercise = ?', [$user->id, $request->route('id')]);
        var_dump($exists);
        return view('escape',compact('id_exo', 'id', 'uuid'));
    }
}
