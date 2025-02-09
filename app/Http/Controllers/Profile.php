<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactAdmins;

class Profile extends Controller
{
    function index(){
        $user = Auth::user();
        $user_lvl = DB::select('select * from user_lvl where id_user = ?', [$user->id]);
        $user_badges = DB::select('select * from user_badges where id_user = ? order by created_at', [$user->id]);
        $badges = [];
        foreach($user_badges as $ub){
            $badges[$ub->id_badge] = DB::select('select * from storage_badges where id = ?', [$ub->id_badge]);
        }
        $user_info = DB::select('select * from user_info where id_user = ?', [$user->id]);
        $user_maths = DB::select('select * from user_maths where id_user = ?', [$user->id]);
        return view('profil', compact('user','user_lvl','user_badges', 'badges', 'user_info', 'user_maths'));
    }

    function indexMsg($message){
        $user = Auth::user();
        $user_lvl = DB::select('select * from user_lvl where id_user = ?', [$user->id]);
        $user_badges = DB::select('select * from user_badges where id_user = ?', [$user->id]);
        $badges = [];
        foreach($user_badges as $ub){
            $badges[$ub->id_badge] = DB::select('select * from storage_badges where id = ?', [$ub->id_badge]);
        }
        $user_info = DB::select('select * from user_info where id_user = ?', [$user->id]);
        $user_maths = DB::select('select * from user_maths where id_user = ?', [$user->id]);
        return view('profil', compact('user','user_lvl','user_badges', 'badges', 'message', 'user_info', 'user_maths'));
    }

    function update(Request $request) {
        $message = "Erreur.";
        if($request->typeOfForm == "pseudo") {
            $validatedData = $request->validate([
                'newPseudo' => 'required|max:16',
                'password' => 'required',
            ]);
            $newPseudo = $request->input('newPseudo');
            $pass = $request->input('password');
            $user = Auth::user();
            $passUser = DB::select('select password from users where id = ?', [$user->id]);
            if (Hash::check($pass, $passUser[0]->password)) {
                //Passwords are equals, processing
                DB::table('users')->where('id', $user->id)->update(['name' => $newPseudo]);
                $user->name = $newPseudo;
                $message = 'Pseudonyme modifié avec succès !';
            } else {
                $message = 'Erreur lors de la modification : les mots de passe divergent';
            }
        } else if ($request->typeOfForm == "email") {
            $validatedData = $request->validate([
                'newEmail' => 'required|email',
                'password' => 'required',
            ]);
            $newEmail = $request->input('newEmail');
            $pass = $request->input('password');
            $user = Auth::user();
            $passUser = DB::select('select password from users where id = ?', [$user->id]);
            if (Hash::check($pass, $passUser[0]->password)) {
                //Passwords are equals, processing
                DB::table('users')->where('id', $user->id)->update(['email' => $newEmail]);
                $user->email = $newEmail;
                $message = 'Adresse mail modifié avec succès !';
            } else {
                $message = 'Erreur lors de la modification : les mots de passe divergent';
            }
        } else if ($request->typeOfForm == "password") {
            $validatedData = $request->validate([
                'newPassword' => 'required|min:6',
                'confirmNewPassword' => 'required|min:6',
                'currentPassword' => 'required',
            ]);
            $newPass = $request->input('newPassword');
            $confirmNewPass = $request->input('confirmNewPassword');
            $pass = $request->input('currentPassword');
            $user = Auth::user();
            $passUser = DB::select('select password from users where id = ?', [$user->id]);
            if (Hash::check($pass, $passUser[0]->password)) {
                //Passwords are equals, processing
                if ($newPass == $confirmNewPass){
                    DB::table('users')->where('id', $user->id)->update(['password' => Hash::make($newPass)]);
                    $message = 'Mot de passe modifié avec succès !';
                } else {
                    $message = 'Les mots de passe ne sont pas égaux.';
                }
            } else {
                $message = 'Erreur lors de la modification : les mots de passe divergent';
            }
        } else if ($request->typeOfForm == "contact") {
            $validatedData = $request->validate([
                'email' => 'required',
                'message' => 'required'
            ]);
            $mail = $request->input('email');
            $mess = $request->input('message');
            Mail::to(env('MAIL_ADMIN_ADDRESS', 'admins@kinimi.fr'))->send(new contactAdmins($mail, $mess));
            $message = "Ton message a été envoyé, les administrateurs reviennent vers toi dans quelques jours tout au plus !";
        }
                
        return $this->indexMsg($message);
    }
}
