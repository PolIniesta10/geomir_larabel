@extends('layouts.box-app')
@vite('resources/js/files/create.js')

@section('box-title')
    {{ __('Add file') }}
@endsection

@section('box-content')
    <form method="post" action="{{ route('files.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="upload">{{ _('File') }}:</label>
            <input type="file" class="form-control" name="upload"/>
        </div>
        <button type="submit" class="btn btn-primary">{{ _('Create') }}</button>
        <button type="reset" class="btn btn-secondary">{{ _('Reset') }}</button>
    </form>
@endsection