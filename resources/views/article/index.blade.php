@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form method="get" action="{{ route('searchArticle') }}">
                    <div class="form-group">
                        <select name="theme" id="theme-select" class="form-control">
                            <option value="">--Please choose a theme--</option>
                            @foreach($themes as $theme)
                                <option value="{{$theme->id}}">{{$theme->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="color" id="color-select" class="form-control">
                            <option value="">--Please choose a color--</option>
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="searchTitle">
                                <input type="text" id="searchTitle" name="searchTitle" class="form-control" placeholder="Que cherchez-vous ?">
                            </label>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="searchCity">
                                <input type="text" id="searchCity" name="searchCity" class="form-control" placeholder="Saisissez une ville">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="searchPriceMin">
                                <input class="custom-range" type="range" id="searchPriceMin" name="searchPriceMin" min="0" max="1000" value="0">Prix min.</label>
                            <span id="val_price_min"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="searchPriceMax"><input class="custom-range" type="range" id="searchPriceMax" name="searchPriceMax" min="1" max="1000" value="1000">Prix max.</label>
                            <span id="val_price_max"></span>
                        </div>
                    </div>


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="searchOnly" id="searchOnly" value="Recherche uniquement par titre">
                        <label class="form-check-label" for="searchOnly">
                            Recherche uniquement par titre
                        </label>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="orer-select" class="orderBy">Trier par</label>
                        <select class="form-control" name="order" id="orer-select">
                            <option value="">--Please choose an option--</option>
                            <option value="orderByPriceAsc">Prix croissant</option>
                            <option value="orderByPriceDesc">Prix décroissant</option>
                            <option value="orderByDateAsc">Date croissant</option>
                            <option value="orderByDateDesc">Date décroissant</option>
                            <option value="orderByTitleAsc">Titre croissant</option>
                            <option value="orderByTitleDesc">Titre décroissant</option>
                        </select>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Rechercher</button>
                        </div>
                    </div>

                    <hr>
                </form>

                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;" alt="icon article" style="height: 225px; width: 100%; display: block;"
                                 src="upload/{{$article->images[0]->url}}" data-holder-rendered="true">
                            <div class="card-body">
                                <p class="card-text">
                                {{ $article->title}}
                                    <br>
                                Prix : {{ $article->price}}€
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary seeMore"><a href="{{route('article.show',['article' =>$article->id])}}">Voir plus</a></button>
                                     </div>
                                    <small class="text-muted">{{$article->updated_at->diffForHumans()}}</small>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $articles->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
