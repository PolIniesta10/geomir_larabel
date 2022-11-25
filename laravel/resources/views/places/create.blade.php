@extends('layouts.box-app')



@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    <div class="formcreate">
        <form method="post" action="{{ route('places.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="cajasformcreate">
                <label for="name">{{ _('Name') }}</label>
                <input type="text" id="name" name="name" class="form-control" />
            </div>
            <div class="cajasformcreate">
                <label for="description">{{ _('Description') }}</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <div class="cajasformcreate">
                <label for="upload">{{ _('File') }}</label>
                <input type="file" id="upload" name="upload" class="form-control" />
            </div>
            <div class="cajasformcreate">            
                    <label for="latitude">{{ _('Latitude') }}</label>
                    <input type="text" id="latitude" name="latitude" class="form-control"
                        value="41.2310371"/>
            </div>
            <div class="cajasformcreate">            
                <label for="longitude">{{ _('Longitude') }}</label>
                <input type="text" id="longitude" name="longitude" class="form-control"
                        value="1.7282036"/>
            </div>
            <div class="botonescreate">
                <button type="submit" class="botoncreate">{{ _('Create') }}</button>
                <button type="reset" class="resetcreate">{{ _('Reset') }}</button>
                <a href="/home"><input type="button" class="cancelarcreate" value="Cancelar"></a>
            </div>
        </form>
    </div>
@endsection