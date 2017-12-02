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
        
        var_dump($badges);
        return view('profil', compact('user','user_lvl','user_badges', 'badges'));
    }
}
