@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ARTICLES</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($article->images as $key => $image)
                                    <li data-target="#carouselExampleControls" data-slide-to="{{$key}}" @if($key === 0) class="active" @endif ></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @foreach($article->images as $key => $image)
                                        <div class="carousel-item @if($key === 0) active @endif">
                                            <img class="d-block w-100" src="{{asset('upload/'. $image->url)}}"  alt="image de mon annonce">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        <p>{{ $article->title}}</p>
                        <p>{{ $article->price}}€</p>
                        <p>{{ $article->resum}}</p>
                        <p>Couleur : {{ $article->name}}</p>
                        <p>Localisation : {{ $article->city}}</p>
                        <p>Date de mise en ligne : {{ $article->created_at}}</p>
                        <p>Date de la dernière modifiction : {{ $article->updated_at}}</p>

                        @can('delete', $article)
                            <form method="post" action="{{route('article.destroy',['article'=> $article -> id])}}">
                                @csrf
                                @method('DELETE')
                                <button> Supprimer mon annonce</button>
                            </form>
                        @endcan

                        @can('update', $article)
                            <form method="post" action="{{route('article.edit',['article'=> $article -> id])}}">
                                @csrf
                                @method('get')
                                <button> Modifier mon annonce</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
