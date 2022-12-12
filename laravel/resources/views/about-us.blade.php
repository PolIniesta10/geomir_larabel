@extends('layouts.box-app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<script>

window.addEventListener('load', iniciarOscar, false);
window.addEventListener('load', iniciarPol, false);

function iniciarPol() {
    var cajaPol = document.getElementById('caja-pol');
    cajaPol.addEventListener('mouseover', cambiarImgPol, false);
    cajaPol.addEventListener('mouseout', resetImgPol, false);
}

function cambiarImgPol() {
    var imgPol = document.getElementById('img-pol').src = "https://2img.net/h/2.bp.blogspot.com/_i9W6F3HrNNY/SHsADgjWdqI/AAAAAAAAA7Y/HUbMBdXbOb4/s400/cu%C3%B1ao.jpg";
}

function resetImgPol() {
    var imgPol = document.getElementById('img-pol').src = "https://album.mediaset.es/eimg/2022/06/07/ibai-revela-la-foto-original-de-su-cuenta-de-twitch_e0e3.jpg?w=1200&h=900";
}

function iniciarOscar() {
    var cajaOscar = document.getElementById('caja-oscar');
    cajaOscar.addEventListener('mouseover', cambiarImgOscar, false);
    cajaOscar.addEventListener('mouseout', resetImgOscar, false);
}

function cambiarImgOscar() {
    var imgOscar = document.getElementById('img-oscar').src = "https://album.mediaset.es/eimg/2022/06/07/ibai-revela-la-foto-original-de-su-cuenta-de-twitch_e0e3.jpg?w=1200&h=900";
}

function resetImgOscar() {
    var imgOscar = document.getElementById('img-oscar').src = "https://2img.net/h/2.bp.blogspot.com/_i9W6F3HrNNY/SHsADgjWdqI/AAAAAAAAA7Y/HUbMBdXbOb4/s400/cu%C3%B1ao.jpg";
}

</script>

<div class="title-about-us">
<h1>Conoce a nuestro equipo</h1>
</div>
<div class="container-about-us">

<div class="container-about" id="caja-pol">
    <div class="img-about-pol">
        <img id="img-pol" src="https://album.mediaset.es/eimg/2022/06/07/ibai-revela-la-foto-original-de-su-cuenta-de-twitch_e0e3.jpg?w=1200&h=900">
    </div>
    <div class="spacer"></div>

    <div class="description-about">
        <div class="name-about"><p>Pol Iniesta</p></div>
        <div class="surname-about"><p>El Jefe</p></div>
    </div>
</div>

<div class="container-about" id="caja-oscar">
    <div class="img-about-oscar">
        <img id="img-oscar" src="https://2img.net/h/2.bp.blogspot.com/_i9W6F3HrNNY/SHsADgjWdqI/AAAAAAAAA7Y/HUbMBdXbOb4/s400/cu%C3%B1ao.jpg">
    </div>
    <div class="spacer"></div>
    <div class="description-about">
        <div class="name-about"><p>Oscar Mejías</p></div>
        <div class="surname-about"><p>Pardillo</p></div>
    </div>
</div>

</div>
@endsection