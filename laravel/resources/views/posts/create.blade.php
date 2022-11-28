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
                    <textarea id="body" name="body" class="form-control" placeholder="{{ __('traduct.body') }}"></textarea>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="file" id="upload" name="upload"/>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="latitude" name="latitude" class="form-control"
                    placeholder="{{ __('traduct.latitude') }}"/>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="longitude" name="longitude" class="form-control"
                    placeholder="{{ __('traduct.longitude') }}"/>                       
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <div class="visiblitiy">
                        <div class="visibilityform">
                            <label class="form-check-label" for="visibility_id">{{ __('traduct.visibility_public') }}</label>
                            <input class="form-check" type="radio" name="visibility_id" value="1" checked>
                            
                        </div>
                        <div class="visibilityform">
                            <label class="form-check-label" for="visibility_id">{{ __('traduct.visibility_contacts') }}</label>
                            <input class="form-check" type="radio" name="visibility_id" value="2">  
                        </div>
                        <div class="visibilityform">
                            <label class="form-check-label" for="visibility_id">{{ __('traduct.visibility_private') }}</label>
                            <input class="form-check" type="radio" name="visibility_id" value="3">   
                        </div>
                    </div>
                </div>
            </div>
            <div class="botonescreate">
                <button type="submit" class="botoncreate">{{ __('traduct.create') }}</button>
                <button type="reset" class="resetcreate">{{ __('traduct.reset') }}</button>
                <a href="/home"><input type="button" class="cancelarcreate" value="{{ __('traduct.cancel') }}"></a>
            </div>
            
        </form>
    </div>
    
@endsection