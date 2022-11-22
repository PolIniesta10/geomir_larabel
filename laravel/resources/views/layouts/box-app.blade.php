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
            
            <div class="navigation">
                <ul>
                    <li class="">

                    </li>
                </ul>

            </div>
       </div>
   </div>
</div>
@endsection