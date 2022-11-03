@extends('layouts.app')
 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('Files') }}</div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                           <tr>
                               <td scope="col">ID</td>
                               <td scope="col">Filepath</td>
                               <td scope="col">Filesize</td>
                               <td scope="col">Created</td>
                               <td scope="col">Updated</td>
                           </tr>
                       </thead>
                       <tbody>
                            <tr>
                               <td>{{ $file->id }}</td>
                               <td>{{ $file->filepath }}</td>
                               <td>{{ $file->filesize }}</td>
                               <td>{{ $file->created_at }}</td>
                               <td>{{ $file->updated_at }}</td>
                           </tr>
                           <tr>
                               <td><img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" /></td>
                           </tr>
                       </tbody>
                   </table>
                   <form method="post" action="{{ route('files.update', $file) }}" enctype="multipart/form-data">
                        @method('PUT') 
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control" name="upload"/>
                        </div>
                        <br>
                            <button type="submit" class="btn btn-primary">Editar</button>
                            <button class="btn btn-danger" href="{{ route('files.index') }}">Volver</button>
                    </form> 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection