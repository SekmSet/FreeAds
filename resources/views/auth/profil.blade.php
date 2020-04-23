@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mon profil</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form>
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"  disabled>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control" name="email" value="{{  $user->email }}"  disabled>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date_naissance" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>

                                    <div class="col-md-6">
                                        <input id="date_naissance" type="text" class="form-control" name="date_naissance" value="{{$user->date_naissance }}"  disabled>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pseudo" class="col-md-4 col-form-label text-md-right">{{ __('Pseudo') }}</label>

                                    <div class="col-md-6">
                                        <input id="pseudo" type="text" class="form-control " name="pseudo" value="{{ $user->pseudo }}" disabled>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Ma ville') }}</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control" name="city" value="{{ $user->city }}" disabled >

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                                    <div class="col-md-6">
                                        <input id="telephone" type="tel" class="form-control" name="telephone" value="{{ $user->telephone }}" disabled>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="sexe" class="col-md-4 col-form-label text-md-right">{{ __('Sexe') }}</label>

                                    <div class="col-md-6">
                                        <input id="sexe" type="text" class="form-control" name="sexe" value="{{ $user->sexe }}" disabled>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="themes" class="col-md-4 col-form-label text-md-right">{{ __('Mon thème') }}</label>
                                    <div class="col-md-6">
                                        <input id="themes" type="text" class="form-control" name="themes" value="{{ $user->themes->name }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="colors" class="col-md-4 col-form-label text-md-right">{{ __('Ma couleur') }}</label>
                                    <div class="col-md-6">
                                        <input id="colors" type="text" class="form-control" name="colors" value="{{  $user->colors->name}}" disabled>
                                    </div>
                                </div>
                            </form>

                            <a class="btn btn-primary" href="{{route('editProfil')}}">Editer mon profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
