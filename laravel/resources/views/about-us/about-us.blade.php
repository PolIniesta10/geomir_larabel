@extends('layouts.box-app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        cajaOscar.addEventListener('mouseover', playOscar, false);
        cajaOscar.addEventListener('mouseout', pauseOscar, false);
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

</script>

<div class="title-about-us">
    <h1 class="title">Conoce a nuestro equipo</h1>
</div>

<div class="container-about-us">
    <div class="card" id="cajaPol">
        <div class="face front">

            <img id="img-pol" src="https://album.mediaset.es/eimg/2022/06/07/ibai-revela-la-foto-original-de-su-cuenta-de-twitch_e0e3.jpg?w=1200&h=900">
            <div class="description-about">
                <div class="name-about"><p>Pol Iniesta</p></div>
                <div class="linia"></div>
                <div class="surname-about"><p>Developer</p></div>
            </div>
            
        </div>

        <audio src="CANELITA - JUANITO JUAN (VIDEOCLIP OFICIAL) (NUEVOEXITOS.COM).mp3" id="audioPol"></audio>

        <div class="face back">

            <img id="img-pol" src="https://2img.net/h/2.bp.blogspot.com/_i9W6F3HrNNY/SHsADgjWdqI/AAAAAAAAA7Y/HUbMBdXbOb4/s400/cu%C3%B1ao.jpg">
            <div class="description-about">
                <div class="name-about"><p>Pol Iniesta</p></div>
                <div class="linia"></div>
                <div class="surname-about"><p>El jefe</p></div>
            </div>

        </div>

    </div>

<!-- 
    ///////////////////////////////////////////////////////////////
                            CAJA OSCAR
    /////////////////////////////////////////////////////////////// -->

    <div class="card" id="cajaOscar">
        <div class="face front">

            <img id="img-pol" src="https://2img.net/h/2.bp.blogspot.com/_i9W6F3HrNNY/SHsADgjWdqI/AAAAAAAAA7Y/HUbMBdXbOb4/s400/cu%C3%B1ao.jpg">
            <div class="description-about">
                <div class="name-about"><p>Oscar Mejías</p></div>
                <div class="linia"></div>
                <div class="surname-about"><p>Pardillo</p></div>
            </div>
            
        </div>

        <audio src="Bob Esponja Intro (Español de España) (NUEVOEXITOS.COM).mp3" id="audioOscar"></audio>

        <div class="face back">

            <img id="img-pol" src="https://album.mediaset.es/eimg/2022/06/07/ibai-revela-la-foto-original-de-su-cuenta-de-twitch_e0e3.jpg?w=1200&h=900">
            <div class="description-about">
                <div class="name-about"><p>Oscar Mejías</p></div>
                <div class="linia"></div>
                <div class="surname-about"><p>Bob Esponja</p></div>
            </div>

        </div>
    </div>
</div>

<!-- 
///////////////////////////////////////////////////////////////
                            MODAL
/////////////////////////////////////////////////////////////// -->


<div class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"></div>
            <video id="slider" autoplay loop>
                <source src="CrazyFrog.mp4" type="video/mp4">
            </video>
            <ul class="menu-navigation">
                <li onclick="videoURl('CrazyFrog.mp4')"><img src="CrazyFrog.jpg"></li>
                <li onclick="videoURl('OsitoGominola.mp4')"><img src="OsitoGominola.jpg"></li>
            </ul>
        </div>
    </div>
</div>
@endsection