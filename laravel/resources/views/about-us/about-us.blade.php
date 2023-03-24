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

    // var modal = document.getElementById("myModal");

    // // Get the button that opens the modal
    // var btn = document.getElementById("myBtn");

    // // Get the <span> element that closes the modal
    // var span = document.getElementsByClassName("close")[0];

    // // When the user clicks the button, open the modal 
    // myBtn.onclick = function() {
    // modal.style.display = "block";
    // }

    // // When the user clicks on <span> (x), close the modal
    // span.onclick = function() {
    // modal.style.display = "none";
    // }

    // // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    // if (event.target == modal) {
    //     modal.style.display = "none";
    // }
    
        ///////////////////////////////////////////////////////////////
                           //SPEECHSYNTHESIS
    ///////////////////////////////////////////////////////////////

    onload = function() {
        if ("speechSynthesis" in window) with(speechSynthesis) {

        // 2.1 CLICK PARA LEER UN ELEMENTO

            function leerTexto() {
                var texto = document.getElementById("leerTexto").innerText;
                var synth = window.speechSynthesis;
                var msg = new SpeechSynthesisUtterance();
                msg.text = texto;
                synth.speak(msg);
            }
            var boton = document.getElementById("leerTexto");
            boton.addEventListener("click", leerTexto);

        // 2.2 DOBLECLICK PARA LEER UN ELEMENTO Y SUS HIJOS

            // INIZIALIZAMOS VARIABLES 

            var playEle = document.querySelector("#playEle");
            var pauseEle = document.querySelector("#pauseEle");
            var stopEle = document.querySelector("#stopEle");

            // AÑADIMOS EVENTO AL DOBLECLICK

            playEle.addEventListener("dblclick", onClickPlay);
            pauseEle.addEventListener("dblclick", onClickPause);
            stopEle.addEventListener("dblclick", onClickStop);

            // RESETEAMOS VARIABLES PARA EVITAR PROBLEMAS LUEGO

            var flag = false;
            cancel();

            // FUNCION AL HACER DOBLECKICK EN EL BOTON PLAY 

            function onClickPlay() {
                if (!flag) {
                    flag = true;
                    utterance = new SpeechSynthesisUtterance(document.querySelector(".speechSynthesis").textContent);
                    utterance.voice = getVoices()[0];
                    utterance.onend = function() {
                        flag = false;
                        playEle.className = pauseEle.className = "";
                        stopEle.className = "stopped";
                    };
                    playEle.className = "played";
                    stopEle.className = "";
                    speak(utterance);
                }
                // COMPROVAMOS SI ESTA PAUSADO

                if (paused) { /* unpause/resume narration */
                    playEle.className = "played";
                    pauseEle.className = "";
                    resume();
                }
            }

            // FUNCION AL HACER DOBLECKICK EN EL BOTON PAUSE (ESTA INVISIBLE) 

            function onClickPause() {
                if (speaking && !paused) { /* pause narration */
                    pauseEle.className = "paused";
                    playEle.className = "";
                    pause();
                }
            }

            // FUNCION AL HACER DOBLECKICK EN EL BOTON STOP 

            function onClickStop() {
                if (speaking) { /* stop narration */
                    /* for safari */
                    stopEle.className = "stopped";
                    playEle.className = pauseEle.className = "";
                    flag = false;
                    cancel();

                }
            }

        // 2.3 ESCUCHAR TODA LA PAGINA CON TECLAS

            document.onkeydown = function(e) {

                // INIZIALIZAMOS VARIABLES 

                var playAll = document.querySelector("#playAll");
                var pauseAll = document.querySelector("#pauseAll");
                var stopAll = document.querySelector("#stopAll");

                // RESETEAMOS VARIABLES PARA EVITAR PROBLEMAS LUEGO

                var flagAll = false;
                cancel()

                // LEER TODA LA PAGINA (SHIFT + NUMPAD = 1)
                if (e.shiftKey && e.which == 97) {
                    if (!flagAll) {
                        flagAll = true;
                        utterance = new SpeechSynthesisUtterance(document.querySelector("article").textContent);
                        utterance.voice = getVoices()[0];
                        utterance.onend = function() {
                            flagAll = false;
                            playAll.className = pauseAll.className = "";
                            stopAll.className = "stopped";
                        };
                        playAll.className = "played";
                        stopAll.className = "";
                        speak(utterance);
                    }
                }

                // PARAR DE LEER (SHIFT + NUMPAD = 0)
                else if (e.shiftKey && e.which == 96) {
                    function onClickPauseAll() {
                        if (speaking && !paused) { /* pause narration */
                            pauseAll.className = "paused";
                            playAll.className = "";
                            pause();
                        }
                    }

                    function onClickStopAll() {
                        if (speaking) { /* stop narration */
                            /* for safari */
                            stopAll.className = "stopped";
                            playAll.className = pauseAll.className = "";
                            flagAll = false;
                            cancel();

                        }
                    }
                }
            }
        }
    }
    
</script>
<article>
    <div class="titleSpeech">
        <h1>SpeechSynthesis</h1>
    </div>
    <div class="speechSynthesis">
        <div class="contSpeech">
            <div class="textSpeech">
                <p>Escoltar el text d'un element quan fem clic a sobre</p>
            </div>
            <div class="buttonsSpeech">
                <button id=leerTexto aria-label="Leer texto">Leer texto</button>
            </div>
        </div>

        <div class="contSpeech">
            <div class="textSpeech">
                <p>Escoltar el text d'un element i els elements fills quan fem doble clic a sobre</p>
            </div>
            <div class=buttonsSpeech>
                <button id=playEle aria-label="Emperzar a leer"></button> &nbsp;
                <button id=pauseEle aria-label="Pausar"></button> &nbsp;
                <button id=stopEle aria-label="Parar de leer"></button>
            </div>
        </div>

        <div class="contSpeech">
            <div class="textSpeech">
                <p>Escoltar TOT el text de la pàgina web amb una drecera de teclat</p>
            </div>
            <div class=buttonsSpeech>
                <button id=playAll aria-label="Emperzar a leer con SHIFT + NUMPAD 1"></button> &nbsp;
                <button id=pauseAll aria-label="Pausar"></button> &nbsp;
                <button id=stopAll aria-label="Parar de leer con SHIFT + NUMPAD 0"></button>
            </div>
        </div>
    </div>

    <div class="title-about-us">
        <h1 class="title">Conoce a nuestro equipo</h1>
    </div>
    <div class="container-about-us" id="myBtn">

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


    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-body"></div>
                <video id="slider" autoplay loop muted>
                    <source src="/videos/CrazyFrog.mp4" type="video/mp4">
                </video>
                <ul class="menu-navigation">
                    <li onclick="videoURl('/videos/CrazyFrog.mp4')"><img src="/videos/CrazyFrog.jpg"></li>
                    <li onclick="videoURl('/videos/OsitoGominola.mp4')"><img src="/videos/OsitoGominola.jpg"></li>
                </ul>
            </div>
        </div>
    </div>
</article>

@endsection