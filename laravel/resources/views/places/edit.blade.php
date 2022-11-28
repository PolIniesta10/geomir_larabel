@extends('layouts.box-app')

@section('box-title')
    {{ __('Place') . " " . $place->id }}
@endsection

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="editpost">
    <img class="img-fluid" src="{{ asset('storage/'.$file->filepath) }}" title="Image preview"/>
    <form method="POST" action="{{ route('places.update', $place) }}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">{{ __('traduct.name') }}</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $place->name }}" />
        </div>
        <div class="form-group">
            <label for="description">{{ __('traduct.description') }}</label>
            <textarea id="description" name="description" class="form-control">{{ $place->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="upload">{{ __('traduct.file') }}</label>
            <input type="file" id="upload" name="upload" class="form-control" />
        </div>
        <div class="form-group">            
                <label for="latitude">{{ __('traduct.latitude') }}</label>
                <input type="text" id="latitude" name="latitude" class="form-control"
                    value="{{ $place->latitude }}"/>
        </div>
        <div class="form-group">            
                <label for="longitude">{{ __('traduct.longitude') }}</label>
                <input type="text" id="longitude" name="longitude" class="form-control"
                    value="{{ $place->longitude }}"/>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('traduct.update') }}</button>
        <button type="reset" class="btn btn-secondary">{{ __('traduct.reset') }}</button>
        <a class="btn" href="{{ route('places.index') }}" role="button">⬅️ {{ __('traduct.back') }}</a>
    </form>
</div>
@endsection