@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Places') }}</div>
                <div class="card-body">
                    <table class="table">
                        <form method="post" action="{{ route('places.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                                <label for="upload">Name:</label>
                                <input type="text" class="form-control" name="name"/>
                                <br>
                                <label for="upload">Description:</label>
                                <br>
                                <textarea name="description" rows="4" cols="98"></textarea>
                                <br><br>
                                <label for="upload">Latitude:</label>
                                <input type="text" class="form-control" name="latitude"/>
                                <br>
                                <label for="upload">Longitude:</label>
                                <input type="text" class="form-control" name="longitude"/>
                                <br>
                                <label for="upload">File:</label>
                                <input type="file" class="form-control" name="upload"/>
                        </div>
                        <br>
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