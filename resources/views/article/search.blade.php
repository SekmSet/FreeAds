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
                            <label for="searchLocalisation">
                                <input type="text" id="searchLocalisation" name="searchLocalisation" class="form-control" placeholder="Saisissez une ville">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="searchPriceMin">
                                <input class="custom-range" type="range" id="searchPriceMin" name="searchPriceMin" min="1" max="1000" value="1" >Prix min.</label>
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

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Rechercher</button>
                        </div>
                    </div>
                </form>

                <ul>
                    <li><a href="{{route('article.create')}}">Déposer une annonce</a></li>
                </ul>

                <div class="card">
                    <div class="card-header">ARTICLES</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach ($results as $result)
                            <p>{{ $result->title}}</p>
                            <p>{{ $result->price}}€</p>

                            <ul>
                                <li><a href="{{route('article.show',['article' =>$result->id])}}">See more</a></li>
                            </ul>
                            <hr>
                        @endforeach
                        {{ $results->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
