@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Ma messagerie</h2>
                    </div>
                    <div class="card-body">
                        <div>
                            @foreach ($messages as $message)
                                <div>
                                    {{$message->repeater->name}}
                                 </div>
                                <hr>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
