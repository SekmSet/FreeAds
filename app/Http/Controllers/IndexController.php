<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function showIndex()
    {
        return view('index');
    }

    public function indexAction()
    {
        $users = Auth::user();

        if ($users) {
            $byCity = Article::where('city', $users->city)->get();
            $byTheme = Article::where('theme_id', $users->theme_id)->get();
            $byColor = Article::where('color_id', $users->color_id)->get();

            return view('home', [
                'byCity' => $byCity,
                'byTheme' => $byTheme,
                'byColor' => $byColor,
            ]);
        }

        return view('home', [
            'byCity' => [],
            'byTheme' => [],
            'byColor' => [],
        ]);
    }
}
