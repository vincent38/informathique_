<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Profile extends Controller
{
    function index(){
        $user = Auth::user();
        $user_lvl = DB::select('select * from user_lvl where id_user = ?', [$user->id]);
        $user_badges = DB::select('select * from user_badges where id_user = ?', [$user->id]);
        $badges = [];
        foreach($user_badges as $ub){
            $badges[$ub->id_badge] = DB::select('select * from storage_badges where id = ?', [$ub->id_badge]);
        }
        return view('profil', compact('user','user_lvl','user_badges', 'badges'));
    }

    function update(Request $request) {
        $validatedData = $request->validate([
            'newPseudo' => 'required|max:16',
            'password' => 'required',
        ]);
        $newPseudo = $request->input('newPseudo');
        $pass = $request->input('password');
        $user = Auth::user();
        if (DB::select('select password from users where id = ?', [$user->id]) == password_hash($pass)) {
            //Passwords are equals, processing
            DB::table('users')->where('id', $user->id)->update(['name' => $newPseudo]);
            $message = 'Pseudonyme modifié avec succès !';
        } else {
            $message = 'Erreur lors de la modification : les mots de passe divergent';
        }
        return view('profil', compact('user','user_lvl','user_badges', 'badges', 'message'));
    }
}
