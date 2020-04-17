<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->middleware('verified')->except(['index','show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $all_article = Article::all();
        return view('article.index',[
            'articles' => $all_article
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateArticleRequest $request)
    {
        $titre = $request->get('title');
        $price = $request->get('price');
        $resum = $request->get('resum');

        $article = new Article;
        $article->title = $titre;
        $article->price = $price;
        $article->resum = $resum;
        $article->user_id = Auth::id();

        $article->save();

        foreach($request->file('images') as $image) {
            $name= time().$image->getClientOriginalName();
            $image->move(public_path().'/upload/',$name);
            $imageModel= new Image;
            $imageModel->article_id = $article->id;
            $imageModel->url = $name;
            $imageModel->save();
        }

        return redirect()->route('article.show',[
            'article' => $article->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article)
    {
        return view('article.show',[
            'article' => $article
        ]);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Article $article
     * @return  \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('article.edit',[
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Article $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $this->authorize('update', $article);

        $titre = $request->get("title");
        $price =  $request->get("price");
        $resum = $request->get("resum");
        $image = $request->get("image");
        // TODO IMAGE
        $article->title = $titre;
        $article->price = $price;
        $article->resum = $resum;

        print_r($titre);
        print_r($price);
        print_r($resum);

        $article->save();

        return redirect()->route('article.show',[
            'article' => $article->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        foreach ($article->images as $image){
//            Storage::delete('/upload/'.$image->url);
            $image->delete();
        }
        $article->delete();

        return redirect()->route('article.index');    }
}
