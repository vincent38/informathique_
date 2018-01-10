<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Badges;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Maths extends Controller
{
    function index(Request $request) {
        $myId = $request->route('id', 0);
        if (Auth::check()) {
            $user = Auth::user();
            $uuid = DB::select('select uuid from user_uuid where id_user = ?', [$user->id]);
            $uuid = $uuid[0]->uuid;
        } else {
            $user = -1;
            $uuid = "user-not-logged-in";
        }
        return view('maths',compact('myId', 'user', 'uuid'));
    }

    function finish(Request $request) {
        /*
        * Fin jeu mathématiques - callback de traitement des résultats
        * Get : id_user, uuid, token_laravel, formatted_id, lvl_exercice, nb_etapes
        * Op : Add experience to user table if not exists, or update if better
        * Op : Add level to user with levelling up if useful ONLY IF DONE OR UPDATED
        * Op : Add badge if eligible
        * Return : new exp, lvl, score, badge
        */
        /*$validatedData = $request->validate([
            'id' => 'required',
            'uuid' => 'required',
            'id_sto' => 'required',
            'time_spent' => 'required'
        ]);*/
        /*
            Score calculation : Time based scoring system -> the less time you spend, better the score is
            Less points given for each bad response ()
            Multiplier for ?
        */
        $scoreModifier = (($request->route('time') * 100) / 1200);
        $scoreInterm = 100 - $scoreModifier;
        if ($request->route('b') == 0) {$m = 1;} else {$m = 1 + ($request->route('b')*0.1);}
        $score = $scoreInterm * $m;
        $score = round($score);
        if ($score < 0) { $score = 0;}
        /*
            End of scoring system part
        */
        $uuid = $request->route('uuid');
        if ($uuid == "user-not-logged-in") {
            //Utilisateur non connecté, pas de sauvegarde ni de calculs
            return response()->json([
                'msg_status' => 'warning',
                'status' => 'Histoire terminée - Ton score ne sera pas enregistré.',
                'infoplus' => 'Tu as fait un score de '.$score.', mais celui-ci ne sera pas enregistré, car tu n\'es pas connecté. Tu peux créer un compte pour enregistrer tes prochains scores, et accéder à toutes les fonctionnalités.',
                'score' => $score,
            ]);
        } else {
            //Test user exists à partir de son uuid
            $id = DB::select('SELECT id_user FROM user_uuid WHERE uuid = ?', [$uuid]);
            $uid = $id[0]->id_user;
            if (isset($uid)) {
                //User existant
                $exists = DB::select('select * from user_maths where id_user = ? and id_story = ?', [$uid, $request->route('id_sto')]);
                //var_dump($exists);
                if ($exists != null) {
                    //Score déjà présent... Mettre à jour ?
                    $old_score = DB::select('select score from user_maths where id_user = ? and id_story = ?', [$uid, $request->route('id_sto')]);
                    if ($score > $old_score[0]->score) {
                        //On a fait mieux, on met à jour + éventuellement badge better than before
                        DB::table('user_maths')->where('id_user', $uid)->where('id_story', $request->route('id_sto'))->update(['score' => $score]);
                        //$b = Badges::unlock("improve_score_info", 1, $uid);
                        return response()->json([
                            'msg_status' => 'success',
                            'status' => 'Histoire terminée - Tu as amélioré ton précédent record !',
                            'infoplus' => 'Ton score est passé de '.$old_score[0]->score.' à '.$score.'. Bravo :)',
                            'score' => $score
                            //'badge' => $b->original
                        ]);
                    } else {
                        //Meh, on ne fait rien et on se contente de dire que le jeu est fini sans sauvegarde
                        $str = 'Histoire terminée - Tu n\'as pas battu ton record';
                        return response()->json([
                            'msg_status' => 'info',
                            'status' => $str,
                            'infoplus' => 'Tu as fait un score de '.$score.', ton précédent score étant de '.$old_score[0]->score.'.Tu peux réessayer une nouvelle fois l\'histoire, et peut-être débloquer une autre fin, qui sait !',
                            'score' => $score
                        ]);
                    }
                } else {
                    //Score non présent, ajout
                    DB::table('user_maths')->insert([
                        'id_user' => $uid,
                        'id_story' => $request->route('id_sto'),
                        'score' => $score,
                        'created_at' => NOW(),
                        'updated_at' => NOW()
                    ]);
                    //On débloque le badge et on attend le résultat
                    $b = Badges::unlock("end_math_".$request->route('id_sto'), 1, $uid);
                    //On génère le retour (JSON)
                    return response()->json([
                        'msg_status' => 'success',
                        'status' => 'Histoire terminée - Nouveau record !',
                        'infoplus' => 'Tu as terminé le niveau avec un score de '.$score.'. Bravo ! Tu peux passer à la suite, ou réessayer pour peut-être découvrir d\'autres fins !',
                        'score' => $score,
                        'badge' => $b->original
                    ]);
                }
            } else {
                //User inexistant (?!)
                response()->json([
                    'msg_status' => 'error',
                    'status' => 'Erreur, ton identifiant n\'est rattaché à aucun compte.',
                    'infoplus' => 'Nous t\'invitons à contacter un administrateur depuis ton profil, en indiquant que "l\' uuid utilisé ne correspond à aucun id connu".',
                    'score' => 0
                ]);
            }
        }
    }
}
