@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ecrire un message à {{$article->users->name}} pour l'article : {{$article->title}}</h2>
    <form method="post" action="{{route('messages.store')}}">
        @csrf
        <div class="form-group">
            <label for="content">Mon message</label>
            <textarea class="form-control" id="content" name="content" rows="10"></textarea>
            <input type="hidden" name="repeater_id" value="{{$article->users->id}}">
            <button>Envoyer</button>
        </div>
    </form>
</div>
@endsection
