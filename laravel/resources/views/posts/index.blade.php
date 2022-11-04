@extends('layouts.app')
 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('Posts') }}</div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                           <tr>
                               <td scope="col">ID</td>
                               <td scope="col">Body</td>
                               <td scope="col">Latitude</td>
                               <td scope="col">Longitude</td>
                               <td scope="col">Created</td>
                               <td scope="col">Edit</td>
                               <td scope="col">Delete</td>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($posts as $post)
                           <tr>
                               <td><a href="{{ route('posts.show',$post) }}">{{ $post->id }}</a></td>
                               <td>{{ $post->body }}</td>
                               <td>{{ $post->latitude }}</td>
                               <td>{{ $post->latitude }}</td>
                               <td>{{ $post->created_at }}</td>
                               <td>{{ $post->updated_at }}</td>
                               <td><a href="{{ route('posts.edit',$post->id) }}">Editar</a></td>
                               <td>
                               <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                   <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">Add new post</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
