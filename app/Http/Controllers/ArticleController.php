<?php

namespace App\Http\Controllers;

use App\Article;
use App\Color;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Image;
use App\Theme;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->middleware('verified')->except(['index', 'show', 'searchAction']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $themes = Theme::all();
        $colors = Color::all();

        $all_article = Article::paginate(15);

        return view('article.index', [
            'articles' => $all_article,
            'themes' => $themes,
            'colors' => $colors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $themes = Theme::all();
        $colors = Color::all();
        $all_article = Article::all();

        return view('article.create', [
            'articles' => $all_article,
            'themes' => $themes,
            'colors' => $colors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(CreateArticleRequest $request)
    {
        $titre = $request->get('title');
        $price = $request->get('price');
        $resum = $request->get('resum');
        $city = $request->get('city');
        $color = $request->get('color');
        $theme = $request->get('theme');

        $article = new Article;
        $article->title = $titre;
        $article->price = $price;
        $article->resum = $resum;
        $article->city = $city;
        $article->color_id = $color;
        $article->theme_id = $theme;
        $article->user_id = Auth::id();

        $article->save();

        foreach ($request->file('images') as $image) {
            $nameImage = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/upload/', $nameImage);
            $imageModel = new Image;
            $imageModel->article_id = $article->id;
            $imageModel->url = $nameImage;
            $imageModel->save();
        }

        return redirect()->route('article.show', [
            'article' => $article->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return View
     */
    public function show(Article $article)
    {
        $user_id = Auth::id();

        return view('article.show', [
            'article' => $article,
            'user_id' => $user_id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return  View
     * @throws AuthorizationException
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        $themes = Theme::all();
        $colors = Color::all();

        return view('article.edit', [
            'article' => $article,
            'themes' => $themes,
            'colors' => $colors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $this->authorize('update', $article);

        $titre = $request->get('title');
        $price = $request->get('price');
        $resum = $request->get('resum');
        $image = $request->get('image');
        $city = $request->get('city');
        $color = $request->get('color');
        $theme = $request->get('theme');
        // TODO IMAGE
        $article->title = $titre;
        $article->price = $price;
        $article->resum = $resum;
        $article->city = $city;
        $article->color_id = $color;
        $article->theme_id = $theme;

        $article->save();

        return redirect()->route('article.show', [
            'article' => $article->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        foreach ($article->images as $image) {
//            Storage::delete('/upload/'.$image->url);
            $image->delete();
        }
        $article->delete();

        return redirect()->route('article.index');
    }

    public function searchAction(Request $request)
    {
        $themes = Theme::all();
        $colors = Color::all();

        $titre = $request->get('searchTitle');
        $searchOnly = $request->get('searchOnly');
        $searchPriceMin = $request->get('searchPriceMin');
        $searchPriceMax = $request->get('searchPriceMax');
        $color = $request->get('color');
        $theme = $request->get('theme');
        $city = $request->get('searchCity');
        $order = $request->get('order');

        $query = Article::query();

        if (! empty($searchOnly) && ! empty($titre)) {
            $query = $query->where('title', 'like', "%$titre%");
        } elseif (! empty($titre)) {
            $query = $query
                ->where('title', 'like', "%$titre%")
                ->orWhere('resum', 'like', "%$titre%");
        }
        if (! empty($searchPriceMin) && ! empty($searchPriceMax)) {
            $query = $query
                ->whereBetween('price', [$searchPriceMin, $searchPriceMax]);
        }
        if (! empty($color)) {
            $query = $query
                ->where('color_id', $color);
        }
        if (! empty($theme)) {
            $query = $query
                ->where('theme_id', $theme);
        }
        if (! empty($city)) {
            $query = $query
                ->where('city', 'like', "%$city%");
        }
        if (! empty($order)) {
            switch ($order) {
                case 'orderByPriceAsc':
                    $query = $query
                        ->orderBy('price', 'ASC');
                    break;
                case 'orderByPriceDesc':
                    $query = $query
                        ->orderBy('price', 'DESC');
                    break;
                case 'orderByDateAsc':
                    $query = $query
                        ->orderBy('created_at', 'ASC');
                    break;
                case 'orderByDateDesc':
                    $query = $query
                        ->orderBy('created_at', 'DESC');
                    break;
                case 'orderByTitleAsc':
                    $query = $query
                        ->orderBy('title', 'ASC');
                    break;
                case 'orderByTitleDesc':
                    $query = $query
                        ->orderBy('title', 'DESC');
                    break;
                default:
                    return;
            }
        }

        return view('article.index', [
            'articles' => $query->paginate(15),
            'themes' => $themes,
            'colors' => $colors,
        ]);
    }
}
