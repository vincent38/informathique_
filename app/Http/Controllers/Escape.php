<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Badges;
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
        $score = 151; //TODO : Score calculation
        $uuid = $request->route('uuid');
        if ($uuid == "user-not-logged-in") {
            //Utilisateur non connecté, pas de sauvegarde ni de calculs
            return response()->json([
                'msg_status' => 'warning',
                'status' => 'Niveau terminé - Votre score ne sera pas enregistré.',
                'score' => $score,
            ]);
        } else {
            //Test user exists à partir de son uuid
            $id = DB::select('SELECT id_user FROM user_uuid WHERE uuid = ?', [$uuid]);
            $uid = $id[0]->id_user;
            if (isset($uid)) {
                //User existant
                $exists = DB::select('select * from user_info where id_user = ? and id_exercise = ?', [$uid, $request->route('id_exo')]);
                //var_dump($exists);
                if ($exists != null) {
                    //Score déjà présent... Mettre à jour ?
                    $old_score = DB::select('select score from user_info where id_user = ? and id_exercise = ?', [$uid, $request->route('id_exo')]);
                    if ($score > $old_score[0]->score) {
                        //On a fait mieux, on met à jour + éventuellement badge better than before
                        DB::table('user_info')->where('id_user', $uid)->where('id_exercise', $request->route('lvl_exercice'))->update(['score' => $score]);
                        $b = Badges::unlock("improve_score_info", 1, $uid);
                        return response()->json([
                            'msg_status' => 'success',
                            'status' => 'Niveau terminé - Vous avez amélioré votre précédent record !',
                            'score' => $score,
                            'badge' => $b->original
                        ]);
                    } else {
                        //Meh, on ne fait rien et on se contente de dire que le jeu est fini sans sauvegarde
                        $str = 'Niveau terminé - Vous n\'avez pas battu votre record de '.$old_score[0]->score;
                        return response()->json([
                            'msg_status' => 'info',
                            'status' => $str,
                            'score' => $score
                        ]);
                    }
                } else {
                    //Score non présent, ajout
                    DB::table('user_info')->insert([
                        'id_user' => $uid,
                        'id_exercise' => $request->route('id_exo'),
                        'lvl_exercise' => $request->route('lvl_exercice'),
                        'score' => $score,
                        'created_at' => NOW(),
                        'updated_at' => NOW()
                    ]);
                    //On débloque le badge et on attend le résultat
                    $b = Badges::unlock("end_info_0", 1, $uid);
                    //On génère le retour (JSON)
                    return response()->json([
                        'msg_status' => 'success',
                        'status' => 'Niveau terminé - Nouveau record !',
                        'score' => $score,
                        'badge' => $b->original
                    ]);
                }
            } else {
                //User inexistant (?!)
                response()->json([
                    'msg_status' => 'error',
                    'status' => 'Erreur, votre identifiant n\'est rattaché à aucun compte.',
                    'score' => 0
                ]);
            }
        }
    }
}
