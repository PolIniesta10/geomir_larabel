@extends('layouts.app')
 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('Posts') }}</div>
               <div class="card-body">
                   <table class="table">
                        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="upload">Body:</label>
                            <br>
                            <textarea name="body" rows="4" cols="83"></textarea>
                            <br>
                            <label for="upload">Latitude:</label>
                            <input type="text" class="form-control" name="latitude"/>
                            <br>
                            <label for="upload">Longitude:</label>
                            <input type="text" class="form-control" name="longitude"/>
                            <br>
                            <label for="upload">Post:</label>
                            <input type="file" class="form-control" name="upload"/>
                            <br>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </form>
                    </table>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection