@extends('layouts.box-app')
@section('content')
<!-- @section('box-title')
    {{ __('Places') }}
@endsection

@section('box-content')
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Name</td>
                    <td scope="col">Description</td>
                    <td scope="col">File</td>
                    <td scope="col">Lat</td>
                    <td scope="col">Lng</td>
                    <td scope="col">Created</td>
                    <td scope="col">Updated</td>
                    <td scope="col"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($places as $place)
                <tr>
                    <td>{{ $place->id }}</td>
                    <td>{{ $place->name }}</td>
                    <td>{{ substr($place->description,0,10) . "..." }}</td>
                    <td>{{ $place->file_id }}</td>
                    <td>{{ $place->latitude }}</td>
                    <td>{{ $place->longitude }}</td>
                    <td>{{ $place->created_at }}</td>
                    <td>{{ $place->updated_at }}</td>
                    <td>
                        <a title="{{ _('View') }}" href="{{ route('places.show', $place) }}">👁️</a>
                        <a title="{{ _('Edit') }}" href="{{ route('places.edit', $place) }}">📝</a>
                        <a title="{{ _('Delete') }}" href="{{ route('places.show', [$place, 'delete' => 1]) }}">🗑️</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary" href="{{ route('places.create') }}" role="button">➕ {{ _('Add new place') }}</a>
@endsection -->
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="masterpost">
    @foreach ($places as $place)
        <div class="post">
            <img src="{{ asset('storage/'.$place->file->filepath) }}"></img>
            <div class="edit">
                <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-pencil"></i></a>
                <form id="form" method="POST" action="{{ route('places.destroy', $place) }}" style="display: inline-block;">
                    @csrf
                    @method("DELETE")
                    <button id="destroy" type="submit" class="botoneliminar" data-bs-toggle="modal" data-bs-target="#confirmModal"><i class="fa-solid fa-trash"></i></button>
                </form>
                <a href="{{ route('places.show', $place) }}"><i class="fa-solid fa-eye"></i></a>
                @if($place->authUserHasFav())
                    <form method="POST" action="{{ route('places.unfavorite',$place) }}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="botonfav" type="submit"><i class="fa-solid fa-star"></i></button>
                        
                    </form> 
                @else 
                    <form method="POST" action="{{ route('places.favorite',$place) }}" enctype="multipart/form-data">
                        @csrf
                        <button class="botonfav" type="submit"><i class="fa-regular fa-star"></i></button>
                    </form> 
                @endif 
    
            </div>
            <div class="text-topics2">
                <a href="#">{{ __('traduct.comments') }}</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
