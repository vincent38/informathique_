<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Notifications\BadgeGained;

class Badges extends Controller
{
    static function unlock(string $action, int $number, int $uid) {
        //Check si les actions et nombres correspondent
        //Si badge non présent, on l'ajoute
        $nbBadge = DB::select("SELECT * FROM `storage_badges` WHERE action = ? AND count_action = ?", [$action, $number]);
        if ($nbBadge != null) {
            //Badge existant
            if (!Badges::check($nbBadge[0]->id, $uid)) {
                //On ne l'a pas
                DB::table('user_badges')->insert(['id_user' => $uid, 'id_badge' => $nbBadge[0]->id, 'created_at' => NOW(), 'updated_at' => NOW()]);
                //Ajout de 10 exp * nb_action
                $lvlCurrent = DB::select("SELECT exp, lvl, exp_sum FROM user_lvl WHERE id_user = ?", [$uid]);
                $newExp = 10*$number + $lvlCurrent[0]->exp;
                $expSum = 10*$number + $lvlCurrent[0]->exp_sum;
                $oldLvl = $lvlCurrent[0]->lvl;
                $newLvl = $lvlCurrent[0]->lvl;
                while ($newExp >= $newLvl * 100) {
                    //On retire le nb d'exp et on ajoute 1 lvl tant que au dessus d'un palier
                    $newExp = $newExp - $newLvl * 100;
                    $newLvl = $newLvl + 1;
                }
                DB::table('user_lvl')->where('id_user', $uid)->update(['exp' => $newExp, 'lvl' => $newLvl, 'exp_sum' => $expSum]);
                return response()->json([
                    'status' => "badge_unlocked",
                    'badge_name' => $nbBadge[0]->name,
                    'badge_data' => $nbBadge[0]->data,
                    'lvl' => 'Niveau : '.$oldLvl.' -> '.$newLvl,
                    'exp' => 'Expérience : '.$newExp.'/'.($newLvl * 100).' (+'.($number*10).')'
                ]);
            } else {
                //On l'a déjà
                return response()->json([
                    'status' => "badge_already_unlocked",
                ]);
            }
        } else {
            //Badge inexistant
            return response()->json([
                'status' => "no_badge",
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
