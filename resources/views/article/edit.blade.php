@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier mon annonce') }}</div>
                    <div class="card-body">
                        <form method="post" action="{{route('article.update',['article'=> $article->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $article->title}}"  autocomplete="title" required autofocus>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prix') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $article->price }}"  autocomplete="price" required autofocus>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{$article->city}}"  autocomplete="city" required autofocus>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <select name="theme" id="theme-select" class="form-control">
                                    <option value="">--Please choose a theme--</option>
                                    @foreach($themes as $theme)
                                        <option value="{{$theme->id}}" @if ($theme->id === $article->theme_id)
                                        selected
                                            @endif
                                        >{{$theme->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="color" id="color-select" class="form-control">
                                    <option value="">--Please choose a color--</option>
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}" @if ($color->id === $article->color_id)
                                                selected
                                            @endif
                                            >{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="resum" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control  @error('resum') is-invalid @enderror" id="resum" name="resum" rows="3" required>{{$article->resum}}</textarea>
                                    @error('resum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="images" class="col-md-4 col-form-label text-md-right">Image </label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control-file @error('images') is-invalid @enderror" name="images[]" id="images" multiple>
                                    @error('images')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Modifier') }}
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
