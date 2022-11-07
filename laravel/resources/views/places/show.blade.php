@extends('layouts.app')
 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('Places') }}</div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                           <tr>
                                <td scope="col">ID</td>
                                <td scope="col">Name</td>
                                <td scope="col">Description</td>
                                <td scope="col">Latitude</td>
                                <td scope="col">Longitude</td>
                                <td scope="col">Created</td>
                                <td scope="col">Updated</td>
                                <td scope="col">Edit</td>
                                <td scope="col">Delete</td>
                           </tr>
                       </thead>
                       <tbody>
                            <tr>
                               <td>{{ $place->id }}</td>
                               <td>{{ $place->name }}</td>
                               <td>{{ $place->description }}</td>
                               <td>{{ $place->latitude }}</td>
                               <td>{{ $place->longitude }}</td>
                               <td>{{ $place->created_at }}</td>
                               <td>{{ $place->updated_at }}</td>
                           </tr>
                           <tr>
                               <td scope="col">img</td>
                               <td><img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" /></td>
                           </tr>
                       </tbody>
                   </table>
                   <a class="btn btn-primary" href="{{ route('places.index') }}" role="button">Volver</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection