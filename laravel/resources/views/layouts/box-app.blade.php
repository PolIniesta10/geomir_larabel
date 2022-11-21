@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <!-- <div class="card">
               <div class="my-card-header">
                   @yield('box-title')
               </div>
               <div class="card-body">
                   @yield('box-content')
               </div>
            </div> -->
            
            <div class="card">
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
                    <a href="#">Ver todos los comentarios</a>
                </div>
           </div>

            <div class="card">
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
                    <a href="#">Ver todos los comentarios</a>
                </div>
            </div>
       </div>
   </div>
</div>
@endsection