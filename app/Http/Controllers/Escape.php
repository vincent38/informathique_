<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Escape extends Controller
{
    function index(Request $request) {
        $myId = $request->route('id', 0);
        return view('escape',compact('myId'));
    }

    function finish(Request $request) {
        /*
        * Fin jeu informatique - callback de traitement des résultats
        * Get : id_user, token, formatted_id, lvl_exercice, nb_etapes
        * Op : Add experience to user table if not exists, or update if better
        * Op : Add level to user with levelling up if useful ONLY IF DONE OR UPDATED
        * Op : Add badge if eligible
        * Return : new exp, lvl, score, badge
        */
        $validatedData = $request->validate([
            'id' => 'required',
            'lvl_exercice' => 'required',
            'nb_etapes' => 'required'
        ]);
        $user = Auth::user();
        $exists = DB::select('select * from user_info where id_user = ? and id_exercise = ?', [$user->id, $request->route('id')]);
        if ($exists[0] != null) {
            echo 
        }
    }
}
