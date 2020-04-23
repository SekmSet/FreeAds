@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <h2>Messages envoyés</h2>
                    @foreach ($users as $user)
                        <div class="list-group">
                            <a class="list-group-item @if($user->id == $userSelected->id) active @endif" href="{{route('messages.index', ['id' => $user->id])}}">{{$user->name}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <div>
                    <h2>Messages envoyés</h2>
                    @foreach ($messages as $message)
                        <div>
                            {{$message->sender->name}}<br>
                            {{$message->content}}
                            <hr>
                        </div>
                    @endforeach

                    <h2>Ecrire un message à {{$userSelected->name}}</h2>
                    <form method="post" action="{{route('messages.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="content">Mon message</label>
                            <textarea class="form-control" id="content" name="content" rows="10"></textarea>
                            <input type="hidden" name="repeater_id" value="{{$userSelected->id}}">
                            <button>Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
 @endsection
