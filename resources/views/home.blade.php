@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(empty($byCity) && empty($byTheme) && empty($byColoe))

                <div class="position-relative overflow-hidden text-center bg-light header_container">
                    <div class="col-md-5 p-lg-5 mx-auto my-5">
                        <h2 class="display-4 font-weight-normal slog">Bienvenu sur L'BonCoin</h2>
                    </div>
                </div>
                <hr>
                    <ul id="newArticle">
                        <li><a href="{{route('article.create')}}">Déposer une annonce</a></li>
                    </ul>
                <hr>
            @else
                <div class="card">
                    <div class="card-header"><h2>Nos suggestions conçu spécialement pour vous …</h2>
                </div>
                <div class="card-body">
                    <h3>Suggestions par vile …</h3>
                    <div class="row">
                        @foreach ($byCity as $city)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;" alt="icon article" style="height: 225px; width: 100%; display: block;"
                                         src="upload/{{$city->images[0]->url}}" data-holder-rendered="true">
                                    <div class="card-body">
                                        <p class="card-text">
                                            {{$city->title}}
                                            <br>
                                            Prix : {{ $city->price}}€
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn seeMore btn-sm btn-outline-secondary"><a href="{{route('article.show',['article' =>$city->id])}}">Voir l'article</a></button>
                                            </div>
                                            <small class="text-muted">{{$city->updated_at->diffForHumans()}}</small>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <h3>Suggestions par thème …</h3>
                    <div class="row">
                    @foreach ($byTheme as $theme)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;" alt="icon article" style="height: 225px; width: 100%; display: block;"
                                         src="upload/{{$theme->images[0]->url}}" data-holder-rendered="true">
                                    <div class="card-body">
                                        <p class="card-text">
                                            {{$theme->title}}
                                            <br>
                                            Prix : {{ $theme->price}}€
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn seeMore btn-sm btn-outline-secondary"><a href="{{route('article.show',['article' =>$theme->id])}}">Voir l'article</a></button>
                                            </div>
                                            <small class="text-muted">{{$theme->updated_at->diffForHumans()}}</small>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <h3>Suggestions par couleur …</h3>
                    <div class="row">
                        @foreach ($byColor as $color)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;" alt="icon article" style="height: 225px; width: 100%; display: block;"
                                         src="upload/{{$color->images[0]->url}}" data-holder-rendered="true">
                                    <div class="card-body">
                                        <p class="card-text">
                                            {{$color->title}}
                                            <br>
                                            Prix : {{ $color->price}}€
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm seeMore btn-outline-secondary"><a href="{{route('article.show',['article' => $color->id])}}">Voir l'article</a></button>
                                            </div>
                                            <small class="text-muted">{{$color->updated_at->diffForHumans()}}</small>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
