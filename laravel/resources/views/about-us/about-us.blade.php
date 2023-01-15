@extends('layouts.box-app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<script>

    window.addEventListener('load', iniciarOscar, false);
    window.addEventListener('load', iniciarPol, false);

    function iniciarPol() {
        var audioPol = document.getElementById("audioPol");
        var cajaPol = document.getElementById('cajaPol');
        cajaPol.addEventListener('mouseover', playPol, false);
        cajaPol.addEventListener('mouseout', pausePol, false);
    }

    function playPol() {
        audioPol.play();
    }

    function pausePol() {
        audioPol.pause();
    }

    function iniciarOscar() {
        var audioOscar = document.getElementById("audioOscar");
        var cajaOscar = document.getElementById('cajaOscar');
        cajaOscar.addEventListener('mouseover', playOscar, true);
        cajaOscar.addEventListener('mouseout', pauseOscar, true);
    }

    function playOscar() {
        audioOscar.play();
    }

    function pauseOscar() {
        audioOscar.pause();
    }

    function videoURl(video){
        document.getElementById("slider").src = video;
    }

    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }

</script>

<div class="title-about-us">
    <h1 class="title">Conoce a nuestro equipo</h1>
</div>

<div class="container-about-us" >

    <div class="drag-drop" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div class="drag-drop" ondrop="drop(event)" ondragover="allowDrop(event)">

        <div class="card" id="cajaPol" draggable="true" ondragstart="drag(event)">
            <div class="face front-pol">

                <img id="img-pol" src="https://album.mediaset.es/eimg/2022/06/07/ibai-revela-la-foto-original-de-su-cuenta-de-twitch_e0e3.jpg?w=1200&h=900" draggable="false" >
                <div class="description-about">
                    <div class="name-about"><p>Pol Iniesta</p></div>
                    <div class="linia"></div>
                    <div class="surname-about"><p>Developer</p></div>
                </div>
                
            </div>

            <audio src="/videos/CANELITA - JUANITO JUAN (VIDEOCLIP OFICIAL) (NUEVOEXITOS.COM).mp3" id="audioPol"></audio>

            <div class="face back-pol">

                <img id="img-pol" src="https://2img.net/h/2.bp.blogspot.com/_i9W6F3HrNNY/SHsADgjWdqI/AAAAAAAAA7Y/HUbMBdXbOb4/s400/cu%C3%B1ao.jpg" draggable="false" >
                <div class="description-about">
                    <div class="name-about"><p>Pol Iniesta</p></div>
                    <div class="linia"></div>
                    <div class="surname-about"><p>El jefe</p></div>
                </div>

            </div>
        </div>
    </div>

<!-- 
    ///////////////////////////////////////////////////////////////
                            CAJA OSCAR
    /////////////////////////////////////////////////////////////// -->

    <div class="drag-drop" ondrop="drop(event)" ondragover="allowDrop(event)">
        <div class="card" id="cajaOscar" draggable="true" ondragstart="drag(event)">
            <div class="face front-oscar">

                <img id="img-oscar" src="https://2img.net/h/2.bp.blogspot.com/_i9W6F3HrNNY/SHsADgjWdqI/AAAAAAAAA7Y/HUbMBdXbOb4/s400/cu%C3%B1ao.jpg" draggable="false" >
                <div class="description-about">
                    <div class="name-about"><p>Oscar Mejías</p></div>
                    <div class="linia"></div>
                    <div class="surname-about"><p>Pardillo</p></div>
                </div>
                
            </div>

            <audio src="/videos/Bob Esponja Intro (Español de España) (NUEVOEXITOS.COM).mp3" id="audioOscar"></audio>

            <div class="face back-oscar">

                <img id="img-oscar" src="https://album.mediaset.es/eimg/2022/06/07/ibai-revela-la-foto-original-de-su-cuenta-de-twitch_e0e3.jpg?w=1200&h=900" draggable="false">
                <div class="description-about">
                    <div class="name-about"><p>Oscar Mejías</p></div>
                    <div class="linia"></div>
                    <div class="surname-about"><p>Bob Esponja</p></div>
                </div>

            </div>
        </div>
    </div>
    <div class="drag-drop" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

</div>

<!-- 
///////////////////////////////////////////////////////////////
                            MODAL
/////////////////////////////////////////////////////////////// -->


<div class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body"></div>
            <video id="slider" autoplay loop>
                <source src="/videos/CrazyFrog.mp4" type="video/mp4">
            </video>
            <ul class="menu-navigation">
                <li onclick="videoURl('/videos/CrazyFrog.mp4')"><img src="/videos/CrazyFrog.jpg"></li>
                <li onclick="videoURl('/videos/OsitoGominola.mp4')"><img src="/videos/OsitoGominola.jpg"></li>
            </ul>
        </div>
    </div>
</div>

@endsection