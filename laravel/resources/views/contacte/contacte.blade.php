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


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<!-- <style>
    /* DESHABILITA SCROLL LATERAL */
    ::-webkit-scrollbar {
        display: none;
    
    }

</style> -->

<script>
    // Obtener la instancia del objeto de reconocimiento de voz
const recognition = new webkitSpeechRecognition();

// Configurar el reconocimiento de voz para que se detenga después de cada frase
recognition.lang = "es-ES";
recognition.continuous = true;
recognition.interimResults = true;
recognition.maxAlternatives = 9;

// Agregar un evento de resultado que se activará cuando el reconocimiento de voz finalice
recognition.onresult = function(event) {
  // Obtener la transcripción del resultado
  const transcript = event.results[event.results.length - 1][0].transcript

  // Comprobar si la transcripción es "zoom in"
  if (transcript.toLowerCase() === "grande") {
  // Aumentar el zoom en un 10%
  document.body.style.zoom = parseFloat(document.body.style.zoom || 1) + 0.5;
  }

  // Comprobar si la transcripción es "zoom out"
 if (transcript.toLowerCase() === "pequeño") {
    // Disminuir el zoom en un 10%
    document.body.style.zoom = parseFloat(document.body.style.zoom || 1) - 0.5;
  }

  // Comprobar si la transcripción es "scroll up"
  if (transcript.toLowerCase() === "sube") {
    // Desplazarse hacia arriba
    window.scroll(0, window.scrollY - window.innerHeight);
  }

  // Comprobar si la transcripción es "scroll down"
  if (transcript.toLowerCase() === "baja") {
    // Desplazarse hacia abajo  
    const scrollHeight = document.body.scrollHeight;
    window.scrollTo(0, scrollHeight);
  }
};

// Iniciar el reconocimiento de voz cuando se haga clic en un botón
recognition.start();

</script>

<section class="showcase">
    <div class="video-container">
        <video src="/videos/video.mov" autoplay muted loop></video>
    </div>
    <div class="content">
        <h1 class="h1contacte">Contacta'ns</h1>
        <h2>Envia el teu missatge</h2>
        <a href="#mapa" class="btncontacte">Formulari de contacte</a>
    </div>
</section>
<section id="mapa">
    <div class="cajamapa">
        <div class="ubicans">
            <h1>Vols visitar-nos?</h1>
            <h2>Ubica'ns al mapa</h2>
        </div>

        <p class="keyText"></p>
    
        <div id="map">
            <script>
                // CREACIÓN MAPA
                var map = L.map('map').setView([41.23112, 1.72866], 18);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                // CREACIÓN MARCADOR EN EL MAPA ESTATICO
                var marker = L.marker([41.23112, 1.72866]).addTo(map);
                marker.bindPopup("Geo-Mir").openPopup();

                // CREACIÓN RADIO EN EL MAPA ESTATICO
                var circle = L.circle([41.23112, 1.72866], {
                    color: 'red',
                    fillColor: '#f03',
                    fillOpacity: 0.5,
                    radius: 90
                }).addTo(map);
                circle.bindPopup("Els nostres voltants ");

                // CREACIÓN POPUP LOCALIZACION ESTATICO
                var popup = L.popup()
                    .setLatLng([41.23112, 1.72866])
                    .setContent("La nostra localització")
                    .openOn(map);


                // CREACION ATAJOS TECLADO
                document.onkeyup = function(e) {

                    // MUESTRA LOCALIZACION DINAMICA (CTRL + ALT + G)
                    if (e.ctrlKey && e.altKey && e.which == 71) {
                        navigator.geolocation.getCurrentPosition(success);
                        function success(position) {
                        var coordenadas = position.coords;
                        alert("Tu posición actual es :"+
                        "\n- Tu Latitud : " + coordenadas.latitude+
                        "\n- Tu Longitud: " + coordenadas.longitude);
                        };
                    } 
                    // REDIRIGE LOCALIZACION AL MIR (CTRL + ALT + C)
                    else if (e.ctrlKey && e.altKey && e.which == 67) {
                        alert("Acepta para centrar el mapa  en el INS Joaquim Mir");
                        map.remove();
                        map = L.map('map').setView([41.2310177, 1.7279358], 17);
                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);
                    }
                    // MUESTRA LOCALIZACION DINAMICA (SHIFT + A)
                    else if (e.shiftKey && e.which == 65) {
                        // Restaurar el nivel de zoom a 1
                        document.body.style.zoom = 1;
                        // Restaurar la posición de desplazamiento a la parte superior de la página
                        window.scrollTo(0, 0);
                    }

                    // CREACIÓN RADIO EN EL MAPA ESTATICO
                    var circle = L.circle([41.23112, 1.72866], {
                        color: 'red',
                        fillColor: '#f03',
                        fillOpacity: 0.5,
                        radius: 90
                    }).addTo(map);
                    circle.bindPopup("Els nostres voltants ");

                    // CREACIÓN MARCADOR EN EL MAPA DINAMICO
                    navigator.geolocation.getCurrentPosition(showPosition);

                    function showPosition(position){
                        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
                        var popup = L.popup()
                        .setLatLng([position.coords.latitude, position.coords.longitude])
                        .setContent("Vostè està aquí")
                        .openOn(map);
                    }

                }

            </script>
        </div>
    </div>
</section>
<section class="footer">
    <div class="contenidofooter">
        <div class="segueixnoscontacte">
            <h2>Segueix-nos a xarxes!</h2>
            <div class="iconoscontacte">
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-linkedin"></i> 
            </div>
            
        </div>
    </div>
</section>
@endsection