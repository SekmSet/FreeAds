@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ __('Modifier mes informations') }} </h2></div>
                    <div class="card-body">
                        <form method="post" action="{{ route('EditProfil') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}"  autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')?? $user->email }}"  autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_naissance" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>

                                <div class="col-md-6">
                                    <input id="date_naissance" type="text" class="form-control @error('date_naissance') is-invalid @enderror" name="date_naissance" value="{{ old('date_naissance')?? $user->date_naissance }}"  placeholder="YYYY-MM-DD" autocomplete="date_naissance" autofocus>

                                    @error('date_naissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pseudo" class="col-md-4 col-form-label text-md-right">{{ __('Pseudo') }}</label>

                                <div class="col-md-6">
                                    <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo')?? $user->pseudo }}" autocomplete="name" autofocus>

                                    @error('pseudo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Ma ville') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city')?? $user->city }}" autocomplete="name" autofocus>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="tel" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone')?? $user->telephone }}">

                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sexe" class="col-md-4 col-form-label text-md-right">{{ __('Sexe') }}</label>

                                <div class="col-md-6">
                                    <input id="sexe" type="text" class="form-control @error('sexe') is-invalid @enderror" name="sexe" value="{{ old('sexe')?? $user->sexe }}">

                                    @error('sexe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="themes" class="col-md-4 col-form-label text-md-right">{{ __('Mon thème') }}</label>
                                <div class="col-md-6">
                                    <select name="themes" id="themes" class="form-control @error('themes') is-invalid @enderror">
                                        @foreach($themes as $theme)
                                            <option value="{{$theme->name}}"
                                                @if($theme->name === $user->themes)
                                                    selected
                                                @endif
                                            >{{$theme->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('themes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="colors" class="col-md-4 col-form-label text-md-right">{{ __('Ma couleur') }}</label>
                                <div class="col-md-6">
                                    <select name="colors" id="colors" class="form-control @error('colors') is-invalid @enderror">
                                        @foreach($colors as $color)
                                            <option value="{{$color->name}}"
                                                @if($color->name === $user->colors)
                                                    selected
                                                @endif
                                            >{{$color->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('colors')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


