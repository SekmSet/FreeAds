<?php

namespace App\Http\Controllers;

use App\Article;
use App\Message;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $idUser = Auth::id();
        $idUserSelected = $request->get('id');
        $userSelected = null;

        if ($idUserSelected) {
            $userSelected = User::findOrFail($idUserSelected);
        }

        $users = [];
        $messages = Message::where('sender_id', $idUser)->orWhere('repeater_id', $idUser)->get()->all();
        foreach ($messages as $message) {
            $users[] = $message->sender;
            $users[] = $message->repeater;
        }
        $collectionUsers = collect($users)->unique()->whereNotIn('id', [$idUser])->values()->all();

        $messages = [];
        if ($idUserSelected) {
            $messages = Message::whereIn('repeater_id', [$idUser, $idUserSelected])->whereIn('sender_id', [$idUser, $idUserSelected])->get()->all();
        }

        return view('message.index', [
            'users' => $collectionUsers,
            'messages' => $messages,
            'userSelected' => $userSelected,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Request $request)
    {
        $article_id = $request->get('article_id');
        $article = Article::where('id', $article_id)->first();

        return view('message.create', [
            'article' => $article,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $content = $request->get('content');
        $sender_id = auth::id();
        $repeater_id = $request->get('repeater_id');

        $message = new Message;
        $message->content = $content;
        $message->sender_id = $sender_id;
        $message->repeater_id = $repeater_id;
        $message->save();

        return redirect()->route('messages.index', ['id' => $repeater_id]);
    }
}
