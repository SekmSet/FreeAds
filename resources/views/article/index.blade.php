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
