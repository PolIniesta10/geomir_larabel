@extends('layouts.box-app')



@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    <div class="formcreate">
        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="camposform">
                <div class="confirmemailpass">
                    <textarea id="body" name="body" class="form-control" placeholder="Body"></textarea>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="file" id="upload" name="upload" />
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="latitude" name="latitude" class="form-control"
                    value="41.2310371"/>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="longitude" name="longitude" class="form-control"
                    value="1.7282036"/>                       
                </div>
            </div>
            <div class="botonescreate">
                <button type="submit" class="botoncreate">{{ _('Create') }}</button>
                <button type="reset" class="resetcreate">{{ _('Reset') }}</button>
                <a href="/home"><input type="button" class="cancelarcreate" value="Cancelar"></a>
            </div>
            
        </form>
    </div>
    
@endsection