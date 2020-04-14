<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class IndexController extends Controller
{
    public function showIndex(){
        return view('index');

    }

    public function profilAction(){
        $user = Auth::user();

        return view('auth.profil', [
            'user' => $user
        ]);

    }

    public function putUpdateUser(EditUserRequest $request){

        $user = Auth::user();

        $telephone = $request->get('telephone');
        $sexe = $request->get('sexe');
        $pseudo  = $request->get('pseudo');
        $nom  = $request->get('nom');
        $email  = $request->get('email');


        /*
          Ensure the user has entered a favorite coffee
        */
        if( $telephone != '' ){
            $user->telephone = $telephone;
        }

        /*
          Ensure the user has entered some flavor notes
        */
        if( $sexe != '' ){
            $user->sexe = $sexe;
        }

        /*
          Ensure the user has submitted a profile visibility update
        */
        if( $pseudo != '' ){
            $user->pseudo = $pseudo;
        }

        if( $nom != '' ){
            $user->nom = $nom;
        }
        if( $email != '' ){
            $user->email = $email;
        }

        $user->save();

        /*
          Return a response that the user was updated successfully.
        */
        return redirect()->route('showProfil');
    }
}
