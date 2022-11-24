@extends('layouts.box-app')
@section('content')
<!-- @section('box-title')
    {{ __('Files') }}
@endsection

@section('box-content')
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Body</td>
                    <td scope="col">File</td>
                    <td scope="col">Lat</td>
                    <td scope="col">Lng</td>
                    <td scope="col">Created</td>
                    <td scope="col">Updated</td>
                    <td scope="col"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ substr($post->body,0,10) . "..." }}</td>
                    <td>{{ $post->file_id }}</td>
                    <td>{{ $post->latitude }}</td>
                    <td>{{ $post->longitude }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <a title="{{ _('View') }}" href="{{ route('posts.show', $post) }}">👁️</a>
                        <a title="{{ _('Edit') }}" href="{{ route('posts.edit', $post) }}">📝</a>
                        <a title="{{ _('Delete') }}" href="{{ route('posts.show', [$post, 'delete' => 1]) }}">🗑️</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">➕ {{ _('Add new post') }}</a>
@endsection -->
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="masterpost">
    <div class="post" style="background-image: url('https://cdn.pixabay.com/photo/2016/02/10/21/59/landscape-1192669__340.jpg');"> 
        <div class="edit">
            <a href="{{ route('posts.edit', $post) }}"><i class="fa-solid fa-pencil"></i> </a>
            
        </div>  
    </div>
    <div class="post"><img src="https://cdn.pixabay.com/photo/2016/02/10/21/59/landscape-1192669__340.jpg" alt="posts"></div>
    <div class="post"><img src="https://cdn.pixabay.com/photo/2016/02/10/21/59/landscape-1192669__340.jpg" alt="posts"></div>
    <div class="post"><img src="https://cdn.pixabay.com/photo/2016/02/10/21/59/landscape-1192669__340.jpg" alt="posts"></div>
    <div class="post"><img src="https://cdn.pixabay.com/photo/2016/02/10/21/59/landscape-1192669__340.jpg" alt="posts"></div>
    <div class="post"><img src="https://cdn.pixabay.com/photo/2016/02/10/21/59/landscape-1192669__340.jpg" alt="posts"></div>
    <div class="post"><img src="https://cdn.pixabay.com/photo/2016/02/10/21/59/landscape-1192669__340.jpg" alt="posts"></div>
    <div class="post"><img src="https://cdn.pixabay.com/photo/2016/02/10/21/59/landscape-1192669__340.jpg" alt="posts"></div>
    <div class="post"><img src="https://cdn.pixabay.com/photo/2016/02/10/21/59/landscape-1192669__340.jpg" alt="posts"></div>
</div>
@endsection