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
                           </tr>
                       </thead>
                       <tbody>
                            <tr>
                               <td>{{ $post->id }}</td>
                               <td>{{ $post->body }}</td>
                               <td>{{ $post->latitude }}</td>
                               <td>{{ $post->longitude }}</td>
                               <td>{{ $post->created_at }}</td>
                           </tr>
                           <tr>
                               <td scope="col">img</td>
                               <td><img class="img-fluid" src="{{ asset("storage/{$post->filepath}") }}" /></td>
                           </tr>
                       </tbody>
                   </table>
                   <a class="btn btn-primary" href="{{ route('posts.index') }}" role="button">Volver</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection