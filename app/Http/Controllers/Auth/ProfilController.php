<?php

namespace App\Http\Controllers\Auth;

use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{

    public function showAction(){
        $user = Auth::user();

        return view('auth.profil', [
            'user' => $user
        ]);

    }

    public function profilAction(){
        $user = Auth::user();
        $colors = Color::all();
        $themes = Theme::all();

        return view('auth.change_profil', [
            'user' => $user,
            'colors' => $colors,
            'themes'=>$themes
        ]);
//        return redirect()->route('editProfil');

    }

    public function putUpdateUser(EditUserRequest $request){

        $user = Auth::user();

        $telephone = $request->get('telephone');
        $sexe = $request->get('sexe');
        $pseudo  = $request->get('pseudo');
        $name  = $request->get('name');
        $email  = $request->get('email');
        $password  = $request->get('password');
        $colors  = $request->get('colors');
        $themes  = $request->get('themes');
        $city  = $request->get('city');
        $date_naissance  = $request->get('date_naissance');

        if( $telephone != '' ){
            $user->telephone = $telephone;
        }

        if( $sexe != '' ){
            $user->sexe = $sexe;
        }

        if( $pseudo != '' ){
            $user->pseudo = $pseudo;
        }

        if( $name != '' ){
            $user->name = $name;
        }
        if( $email != '' ){
            $user->email = $email;
        }
        if( $password != '' ){
            $user->password = $password;
        }
        if( $city != '' ){
            $user->city = $city;
        }
        if( $colors != '' ){
            $user->colors = $colors;
        }
        if( $themes != '' ){
            $user->themes = $themes;
        }if( $date_naissance != '' ){
            $user->date_naissance = $date_naissance;
        }

//        print_r($user);
//        die;
        $user->save();

        return redirect()->route('showProfil');
    }
}
