@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="my-card-header">
                    @yield('box-title')
                </div>
                <div class="card-body">
                    @yield('box-content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<div class="navigation">
    <ul>
        <li class="list active">
            <a href="/home">
                <span class="icon"><i class="fa-solid fa-house"></i></span>
                <span class="title">Home</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                <span class="title">Buscar</span>
            </a>
        </li>
        <li class="list">
            <a href="#popup">
                <span class="icon"><i class="fa-solid fa-camera-retro"></i></span>
                <span class="title">Publicar</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon"><i class="fa-solid fa-bell"></i></span>
                <span class="title">Notificaciones</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon"><i class="fa-solid fa-user"></i></span>
                <span class="title">Perfil</span>
            </a>
        </li>
        <li class="list">
            <a href="/posts">
                <span class="icon"><i class="fa-solid fa-eye"></i></span>
                <span class="title">Posts</span>
            </a>
        </li>
        <li class="list">
            <a href="/places">
                <span class="icon"><i class="fa-solid fa-eye"></i></span>
                <span class="title">Places</span>
            </a>
        </li>
        
        <div class="indicator"></div>
    </ul>
    <div id="popup" class="overlay">
        <div id="popupBody">
            <div class="popupIcono">
                <div>
                    <span class="icon"><i class="fa-solid fa-camera-retro"></i></span>
                </div>
            </div>
            <div class="my-card-header">
                <img src="https://cdn-icons-png.flaticon.com/512/74/74472.png" alt="user">
                <div class="sub-card-header">
                    <div>
                        <h5>Usuario</h5>
                    </div>
                </div>
            </div>
            <div class="popuptitulo">
                <h1>Que quieres publicar?</h1>
                <a id="cerrar" href="/home">&times;</a>
                <p>Elige una opcion</p>
            </div>
            
            
            <div class="popupContent">
                <div class="botoncrear-post">
                    <a href="/posts/create"><input type="button" value="Post"></a>          
                </div>
                <div class="borde"></div>
                <div class="botoncrear-places">
                    <a href="/places/create"><input type="button" value="Place"></a>
                </div>
            </div>
        </div>
    </div>
</div>