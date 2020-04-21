@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Nos suggestions conçu spécialement pour vous …</h2>
            </div>
            <div class="card-body">
                <h3>Suggestions par vile …</h3>

                @foreach ($byCity as $city)
                    <p>{{$city->title}}</p>
                @endforeach
                <hr>
                <h3>Suggestions par thème …</h3>
                @foreach ($byTheme as $theme)
                    <p>{{$theme->title}}</p>
                @endforeach
                <hr>
                <h3>Suggestions par couleur …</h3>
                @foreach ($byColor as $color)
                    <p>{{$color->title}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
