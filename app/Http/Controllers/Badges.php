<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Badges extends Controller
{
    static function unlock(string $action, int $number, int $uid) {
        //Check si les actions et nombres correspondent
        //Si badge non présent, on l'ajoute
        $nbBadge = DB::select("SELECT * FROM `storage_badges` WHERE action = ? AND count_action = ?", [$action, $number]);
        if (!Badges::check($nbBadge[0]->id, $uid)) {
            //On ne l'a pas
            DB::table('user_badges')->insert(['id_user' => $uid, 'id_badge' => $nbBadge[0]->id, 'created_at' => NOW(), 'updated_at' => NOW()]);
            return response()->json([
                'status' => "badge_unlocked",
                'badge_name' => $nbBadge[0]->name,
                'badge_data' => $nbBadge[0]->data
            ]);
        } else {
            //On l'a déjà
            return response()->json([
                'status' => "badge_already_unlocked",
            ]);
        }
        
    }

    static function check(int $nbBadge, int $user) {
        //Check si utilisateur a déjà le badge en question
        $badgeUser = DB::select("SELECT * FROM `user_badges` WHERE id_user = ? AND id_badge = ?", [$user, $nbBadge]);
        if ($badgeUser != null) {
            return true;
        } else {
            return false;
        }
    }
}
