@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="">
                    <div class="form-group">
                        <select name="theme" id="theme-select" class="form-control">
                            <option value="">--Please choose an option--</option>
                            <option value="emplois">Emplois</option>
                            <option value="animaux">Animaux</option>
                            <option value="immobilier">Immobilier</option>
                            <option value="vehicule">Véhicule</option>
                            <option value="vacances">Vacances</option>
                            <option value="multimedia">Multimedia</option>
                            <option value="maison">Maison</option>
                            <option value="mode">Mode</option>
                            <option value="loisir">Loisir</option>
                            <option value="materiel">Materiel professionnel</option>
                            <option value="service">Service</option>
                            <option value="divers">Divers</option>
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
                                <input class="custom-range" type="range" id="searchPriceMin" name="searchPriceMin" min="0" max="1000">Prix min.</label>
                            <span id="val_price_min"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="searchPriceMax"><input class="custom-range" type="range" id="searchPriceMax" name="searchPriceMax" min="1" max="1000">Prix max.</label>
                            <span id="val_price_max"></span>
                        </div>
                    </div>


                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="searchOnly" id="searchOnly" value="Recherche uniquement par titre">
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

                            @foreach ($articles as $article)
                                <p>{{ $article->title}}</p>
                                 <p>{{ $article->price}}€</p>

                                <ul>
                                    <li><a href="{{route('article.show',['article' =>$article->id])}}">See more</a></li>
                                </ul>
                                <hr>
                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
