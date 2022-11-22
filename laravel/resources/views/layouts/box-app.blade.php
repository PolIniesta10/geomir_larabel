@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<<<<<<< HEAD
           <!-- <div class="card">
               <div class="my-card-header">
                   @yield('box-title')
               </div>
               <div class="card-body">
                   @yield('box-content')
               </div>
            </div> -->
            
            <div class="navigation">
                <ul>
                    <li class="">
=======
            <div class="card">
                <div class="my-card-header">
                    @yield('box-title')
                </div>
                <div class="card-body">
                    @yield('box-content')
                </div>
                </div>
                
                <div class="navigation">
                    <ul>
                        <li class="list active">
                            <a href="#">
                                <span class="icon"><i class="fa-solid fa-camera-retro"></i></span>
                                <span class="title">Publicar</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#">
                                <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <span class="title">Buscar</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#">
                                <span class="icon"><i class="fa-solid fa-house"></i></span>
                                <span class="title">Home</span>
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
                        <div class="indicator"></div>
                    </ul>
                </div>
>>>>>>> 3d3bb78407cf36d318554add0d47eabeb0d30d9a

                <script>
                    let list = document.querySelectorAll('li');
                    for (let i=0; i<list.lenght; i++){
                        list[i].onmouseover = function(){
                            let j = 0;
                            while (j < list.lenght){
                                list[j++].className = 'list';
                            }
                            list[i].className = 'list active'
                        }
                    }

                </script>
        </div>
    </div>
</div>

@endsection