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

    public function indexAction(){
        return view('home');
    }
}
