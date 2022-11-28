@extends('layouts.box-app')
@vite(['resources/js/script.js'])
<!-- @section('box-title')
    {{ __('Dashboard') }}
@endsection -->

<!-- @section('box-content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h3>{{ __('Resources') }}</h3>
    <ul>
        <li><a href="{{ url('/files') }}">{{ __('Files') }}</a></li>
        <li><a href="{{ url('/posts') }}">{{ __('Posts') }}</a></li>
        <li><a href="{{ url('/places') }}">{{ __('Places') }}</a></li>
    </ul>
@endsection -->

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
            
            <div class="my-card">
                <div class="my-card-header">
                    <img src="https://cdn-icons-png.flaticon.com/512/74/74472.png" alt="user">
                    <div class="sub-card-header">
                        <div>
                            <h5>Usuario</h5>
                        </div>
                        <div>
                            <p>Ubicación</p>
                        </div>
                    </div>
                    <div class="tiempo-header">

                        <p>15h</p>

                    </div>
                </div>

                <div class="home-container">
                    <div class="home-topics">
                        <img src="https://www.willysplan.com/wp-content/uploads/2020/11/mirador-de-la-figuerassa.jpg" alt="Mirador Chulisimo">
                    </div>
                </div>

                <div class="text-topics">
                    <div>
                        <button><i class="fa-regular fa-heart" onclick="changeIcon(this)"></i></button>
                    </div>
                    <div>
                        <button><i class="fa-regular fa-comment"></i></button>
                    </div>
                    <div>
                        <button><i class="fa-regular fa-floppy-disk"></i></button>
                    </div>
                    <div>
                        <button><i class="fa-regular fa-share-from-square"></i></button>
                    </div>
                </div>

                <div class="text-topics">
                    <a href="#">{{ __('traduct.comments') }}</a>
                </div>
            </div>

            <div class="my-card">
                <div class="my-card-header">
                    <img src="https://cdn-icons-png.flaticon.com/512/74/74472.png" alt="user">
                    <div class="sub-card-header">
                        <div>
                            <h5>Usuario</h5>
                        </div>
                        <div>
                            <p>Ubicación</p>
                        </div>
                    </div>
                    <div class="tiempo-header">

                        <p>15h</p>

                    </div>
                </div>

                <div class="home-container">
                    <div class="home-topics">
                        
                        <img src="https://www.tooltyp.com/wp-content/uploads/2014/10/1900x920-8-beneficios-de-usar-imagenes-en-nuestros-sitios-web.jpg" alt="Mirador Chulisimo">
                        
                        
                    </div>
                </div>

                <div class="text-topics">
                    <div>
                        <button><i class="fa-regular fa-heart" onclick="changeIcon(this)"></i></button>
                    </div>
                    <div>
                        <button><i class="fa-regular fa-comment"></i></button>
                    </div>
                    <div>
                        <button><i class="fa-regular fa-floppy-disk"></i></button>
                    </div>
                    <div>
                        <button><i class="fa-regular fa-share-from-square"></i></button>
                    </div>
                </div>

                <div class="text-topics">
                    <a href="#">{{ __('traduct.comments') }}</a>
                </div>
            </div>

            <div class="my-card">
                <div class="my-card-header">
                    <img src="https://cdn-icons-png.flaticon.com/512/74/74472.png" alt="user">
                    <div class="sub-card-header">
                        <div>
                            <h5>Usuario</h5>
                        </div>
                        <div>
                            <p>Ubicación</p>
                        </div>
                    </div>
                    <div class="tiempo-header">

                        <p>15h</p>

                    </div>
                </div>

                <div class="home-container">
                    <div class="home-topics">
                        
                        <img src="https://cdn.shopify.com/s/files/1/0229/0839/files/bancos_de_imagenes_gratis.jpg?v=1630420628" alt="Mirador Chulisimo">
                        
                        
                    </div>
                </div>

                <div class="text-topics">
                    <div>
                        <button><i class="fa-regular fa-heart" onclick="changeIcon(this)"></i></button>
                    </div>
                    <div>
                        <button><i class="fa-regular fa-comment"></i></button>
                    </div>
                    <div>
                        <button><i class="fa-regular fa-floppy-disk"></i></button>
                    </div>
                    <div>
                        <button><i class="fa-regular fa-share-from-square"></i></button>
                    </div>
                </div>

                <div class="text-topics">
                    <a href="#">{{ __('traduct.comments') }}</a>
                </div>
            </div>  
            

        </div>
    </div>
</div>
<footer>
<div class="cajafootermaster">
    <div class="cajasfooter1">
        <div class="cajaizqfooter">
            <p>Privacy Polcy</p>
            <p>Cookies Polcy</p>
            <p>Quality Polcy</p>
        </div>
    </div>
    <div class="cajasfooter2">
        <div class="cajamediofootermensaje"><h1>{{ __('traduct.comments') }}</h1></div>
        <div class="cajamediofooterredes">
            <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            
            <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
            
            <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            
            <a href="https://facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            
            <a href="https://www.tiktok.com/" target="_blank"><i class="fa-brands fa-tiktok"></i></a>

        </div>
    </div>
    <div class="cajasfooter1">
        <div class="cajaizqfooter">
            <p>LookTracer</p>
            <p>Blog</p>
            <p>Contact</p>
        </div>
    </div>
</div>
</footer>
@endsection



