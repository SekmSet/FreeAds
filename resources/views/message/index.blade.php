@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <h2>Messages envoyés</h2>
                    @foreach ($users as $user)
                        <div class="list-group">
                            <a class="list-group-item @if($userSelected && $user->id == $userSelected->id) active @endif" href="{{route('messages.index', ['id' => $user->id])}}">{{$user->name}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <div>
                    <h2>Messages envoyés</h2>
                    @foreach ($messages as $message)
                        <div class="@if(Auth::id() == $message->sender->id) isme @else notme @endif">
                            @if(Auth::id() == $message->sender->id)
                                <span class="strong">Moi
                                </span>
                            @else
                                <span class="strong">{{$message->sender->name}}  </span>
                            @endif
                            <br>
                            {{$message->content}}
                         </div>
                        <hr>
                    @endforeach

                    @if ($userSelected)
                    <h2>Ecrire un message à {{$userSelected->name}}</h2>
                    <form method="post" action="{{route('messages.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="content">Mon message</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10"></textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input type="hidden" name="repeater_id" value="{{$userSelected->id}}">
                            <button >Envoyer</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
 @endsection
