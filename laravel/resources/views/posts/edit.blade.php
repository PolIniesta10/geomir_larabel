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
                               <td scope="col">Body</td>
                               <td scope="col">Latitude</td>
                               <td scope="col">Longitude</td>
                               <td scope="col">Created</td>
                           </tr>
                       </thead>
                       <tbody>
                            <tr>
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
                   <form method="post" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="upload">Body:</label>
                            <br>
                            <textarea name="body" rows="4" cols="50"></textarea>
                            <br>
                            <label for="upload">Latitude:</label>
                            <input type="text" class="form-control" name="latitude"/>
                            <br>
                            <label for="upload">Longitude:</label>
                            <input type="text" class="form-control" name="longitude"/>
                            <br>
                            <label for="upload">Post:</label>
                            <input type="file" class="form-control" name="upload"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a class="btn btn-primary" href="{{ route('posts.index') }}" role="button">Cancel</a>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
