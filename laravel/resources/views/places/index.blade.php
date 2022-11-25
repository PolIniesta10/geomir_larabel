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
<div class="post" style="background-image: url('https://1.bp.blogspot.com/-JREhSKN8sMM/VmH2B-jmFXI/AAAAAAAAIzg/ScNtA185M88/s1600/02273%2Bpaisajes01.jpg');"> 
        <div class="edit">
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-pencil"></i></a>
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-trash"></i></a>
            <a href="{{ route('places.show', $place) }}"><i class="fa-solid fa-eye"></i></a>
        </div>
       
    </div>
    <div class="post" style="background-image: url('https://1.bp.blogspot.com/-JREhSKN8sMM/VmH2B-jmFXI/AAAAAAAAIzg/ScNtA185M88/s1600/02273%2Bpaisajes01.jpg');">
        <div class="edit">
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-pencil"></i></a>
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-trash"></i></a>
            <a href="{{ route('places.show', $place) }}"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
        <div class="post" style="background-image: url('https://1.bp.blogspot.com/-JREhSKN8sMM/VmH2B-jmFXI/AAAAAAAAIzg/ScNtA185M88/s1600/02273%2Bpaisajes01.jpg');">
        <div class="edit">
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-pencil"></i></a>
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-trash"></i></a>
            <a href="{{ route('places.show', $place) }}"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
    <div class="post" style="background-image: url('https://1.bp.blogspot.com/-JREhSKN8sMM/VmH2B-jmFXI/AAAAAAAAIzg/ScNtA185M88/s1600/02273%2Bpaisajes01.jpg');">
        <div class="edit">
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-pencil"></i></a>
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-trash"></i></a>
            <a href="{{ route('places.show', $place) }}"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
    <div class="post" style="background-image: url('https://1.bp.blogspot.com/-JREhSKN8sMM/VmH2B-jmFXI/AAAAAAAAIzg/ScNtA185M88/s1600/02273%2Bpaisajes01.jpg');">
        <div class="edit">
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-pencil"></i></a>
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-trash"></i></a>
            <a href="{{ route('places.show', $place) }}"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
    <div class="post" style="background-image: url('https://1.bp.blogspot.com/-JREhSKN8sMM/VmH2B-jmFXI/AAAAAAAAIzg/ScNtA185M88/s1600/02273%2Bpaisajes01.jpg');">
        <div class="edit">
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-pencil"></i></a>
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-trash"></i></a>
            <a href="{{ route('places.show', $place) }}"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
    <div class="post" style="background-image: url('https://1.bp.blogspot.com/-JREhSKN8sMM/VmH2B-jmFXI/AAAAAAAAIzg/ScNtA185M88/s1600/02273%2Bpaisajes01.jpg');">
        <div class="edit">
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-pencil"></i></a>
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-trash"></i></a>
            <a href="{{ route('places.show', $place) }}"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
    <div class="post" style="background-image: url('https://1.bp.blogspot.com/-JREhSKN8sMM/VmH2B-jmFXI/AAAAAAAAIzg/ScNtA185M88/s1600/02273%2Bpaisajes01.jpg');">
        <div class="edit">
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-pencil"></i></a>
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-trash"></i></a>
            <a href="{{ route('places.show', $place) }}"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
    <div class="post" style="background-image: url('https://1.bp.blogspot.com/-JREhSKN8sMM/VmH2B-jmFXI/AAAAAAAAIzg/ScNtA185M88/s1600/02273%2Bpaisajes01.jpg');">
        <div class="edit">
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-pencil"></i></a>
            <a href="{{ route('places.edit', $place) }}"><i class="fa-solid fa-trash"></i></a>
            <a href="{{ route('places.show', $place) }}"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
</div>
@endsection
