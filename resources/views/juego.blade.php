@extends('app', [
    'title' => 'Joc - Naterra',
    'logoStyle' => 'left: 770px; top: 0px;',
    'bodyClass' => 'body_mapa'
])

@section('content')
<div class="puzzle" style="height: 600px; width: 100%; display: flex; flex-direction: column; justify-content: space-between; padding: 20px;">
    <!-- HEADER: TITULO, VIDAS Y PUNTOS -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: #FFF30E; margin: 0; font-size: 1.3rem;">C{{ $capitulo }} - P{{ $numPregunta }}</h2>
        <div style="display: flex; gap: 30px; align-items: center;">
            <div style="text-align: center;">
                <span style="font-size: 20px;">Vides:</span>
                <span id="vides" style="font-size: 24px; margin-left: 10px;">❤️ ❤️ ❤️</span>
            </div>
            <div style="text-align: center;">
                <span style="font-size: 20px;">Puntuació:</span>
                <span id="puntuacio" style="font-size: 24px; color: #FFF30E; font-weight: bold; margin-left: 10px;">0</span>
            </div>
        </div>
    </div>

    <!-- PREGUNTA -->
    <div style="text-align: center; margin-bottom: 20px;">
        <p style="font-size: 18px; background: rgba(255,255,255,.2); padding: 15px; border-radius: 10px; color: #fff; border: 2px solid #ffacd6;">{{ $pregActual['pregunta'] }}</p>
    </div>

    <!-- OPCIONES -->
    <div style="display: flex; flex-direction: column; gap: 10px; margin: 15px 0;">
        @foreach($pregActual['opciones'] as $i => $opcion)
            <button class="respuesta-btn" data-indice="{{ $i }}" style="display: block; width: 100%; text-align: left; padding: 12px 15px; border-radius: 8px; background: rgba(255,255,255,.1); color: #fff; border: 2px solid rgba(255,172,214,.3); cursor: pointer; font-size: 16px; transition: all 0.3s ease;">
                {{ $opcion }}
            </button>
        @endforeach
    </div>

    <!-- BOTONES DE NAVEGACIÓN -->
    <div style="display: flex; gap: 10px; justify-content: center;">
        <a href="{{ route('pregunta', [$capitulo, max(1, $numPregunta - 1)]) }}"><button style="background: #FFACD6; color: #000; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">Anterior</button></a>
        @if($hasNext)
            <a href="{{ route('pregunta', [$capitulo, $numPregunta + 1]) }}"><button style="background: #FFACD6; color: #000; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">Següent</button></a>
        @else
            <button disabled style="opacity: 0.5; background: #FFACD6; color: #000; padding: 10px 20px; border: none; border-radius: 8px;">Següent</button>
        @endif
        <a href="{{ route('nivells') }}"><button style="background: #28428C; color: #fff; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">Tornar a Nivells</button></a>
    </div>
</div>

    <div class="right-bar">
        <div class="user" style="margin-top: 0; height: 60px;">
            <img src="{{ Auth::user()->avatar_url }}" class="avatar" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
            <div class="user-name">{{ Auth::user()->name }}</div>
        </div>
        @include('partials.ranking_widget')
    </div>

    <a href="{{ route('repaso') }}" style="text-decoration: none;">
        <div class="repas-circle" role="button" tabindex="0">REPÀS</div>
    </a>

@endsection

@push('scripts')
<script>
// Intentar cargar puntos guardados, si no, inicializar en 0
let puntuacio = 0;
try {
    const puntosSaved = localStorage.getItem('puntuacio_c{{ $capitulo }}');
    puntuacio = puntosSaved ? parseInt(puntosSaved) : 0;
} catch(e) {
    puntuacio = 0;
}

// Intentar cargar vidas guardadas, si no, inicializar en 3
let vidas = 3;
try {
    const vidasSaved = localStorage.getItem('vidas_c{{ $capitulo }}');
    vidas = vidasSaved ? parseInt(vidasSaved) : 3;
} catch(e) {
    vidas = 3;
}

let preguntaRespondida = false;
const indiceCorrecta = parseInt('{{ $pregActual['correcta'] }}');

// Actualizar displays al cargar
window.addEventListener('load', function() {
    actualizarVidas();
    actualizarPuntuacio();
    
    // Attachar event listeners a los botones
    const buttons = document.querySelectorAll('.respuesta-btn');
    buttons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const indice = parseInt(this.getAttribute('data-indice'));
            verificarRespuesta(indice);
        });
    });
});

function verificarRespuesta(indiceSeleccionado) {
    if (preguntaRespondida) return;
    preguntaRespondida = true;

    const buttons = document.querySelectorAll('.respuesta-btn');
    
    if (indiceSeleccionado === indiceCorrecta) {
        // ✅ RESPUESTA CORRECTA - Verde
        buttons[indiceSeleccionado].style.background = '#90EE90';
        buttons[indiceSeleccionado].style.borderColor = '#00AA00';
        buttons[indiceSeleccionado].style.color = '#000';
        puntuacio += 10;
        actualizarPuntuacio();
        guardarPuntos(10); // Guardar 10 puntos inmediatamente
        
        // Deshabilitar todos los botones de respuesta después de responder
        buttons.forEach(btn => btn.disabled = true);
        
        // Si es la última pregunta, mostrar resultado final automáticamente
        if (!{{ $hasNext ? 'true' : 'false' }}) {
            setTimeout(() => {
                mostrarResultadoFinal();
            }, 1500);
        }
        // Si no es la última, el usuario debe hacer clic en "Següent" manualmente
        
    } else {
        // ❌ RESPUESTA INCORRECTA - Rojo
        buttons[indiceSeleccionado].style.background = '#FF6B6B';
        buttons[indiceSeleccionado].style.borderColor = '#AA0000';
        buttons[indiceSeleccionado].style.color = '#fff';
        
        vidas--;
        actualizarVidas();
        
        // Deshabilitar todos los botones de respuesta
        buttons.forEach(btn => btn.disabled = true);
        
        if (vidas === 0) {
            setTimeout(() => {
                alert('Game Over! T\'has quedat sense vides.');
                try {
                    localStorage.removeItem('puntuacio_c{{ $capitulo }}');
                    localStorage.removeItem('vidas_c{{ $capitulo }}');
                } catch(e) {}
                window.location.href = '{{ route("nivells") }}';
            }, 1500);
        }
        // Si quedan vidas, el usuario debe hacer clic en "Següent" o "Anterior" para continuar
        // NO se muestra la respuesta correcta para que aprendan
    }
}

function actualizarVidas() {
    const vidaTexto = vidas > 0 ? '❤️ '.repeat(vidas) : '💔';
    const elemento = document.getElementById('vides');
    if (elemento) {
        elemento.textContent = vidaTexto;
        // Guardar vidas en localStorage
        try {
            localStorage.setItem('vidas_c{{ $capitulo }}', vidas);
        } catch(e) {
            console.log('No se pudo guardar vidas');
        }
    }
}

function actualizarPuntuacio() {
    const elemento = document.getElementById('puntuacio');
    if (elemento) {
        elemento.textContent = puntuacio;
        try {
            localStorage.setItem('puntuacio_c{{ $capitulo }}', puntuacio);
        } catch(e) {
            console.log('No se pudo guardar puntuacion');
        }
    }
}

function mostrarResultadoFinal() {
    const container = document.querySelector('.puzzle');
    if (container) {
        // Guardar puntos en la base de datos
        // Ya no guardamos puntos al final porque se guardan pregunta a pregunta
        // fetch('{{ route("guardar-puntos") }}', ...
        
        // Limpiar localStorage cuando termina el capítulo
        try {
            localStorage.removeItem('puntuacio_c{{ $capitulo }}');
            localStorage.removeItem('vidas_c{{ $capitulo }}');
        } catch(e) {}
        
        const ranking = puntuacio >= 80 ? '⭐⭐⭐ EXCEL·LENT!' : puntuacio >= 60 ? '⭐⭐ BON' : puntuacio >= 40 ? '⭐ ACCEPTABLE' : '❌ MÉS PRÀCTICA';
        
        container.innerHTML = `
            <div style="text-align: center; color: #fff;">
                <h1 style="color: #FFF30E; font-size: 2.5rem; margin-bottom: 30px;">🎉 ¡Capítol Completat! 🎉</h1>
                <div style="background: rgba(255,255,255,.1); border: 3px solid #FFACD6; border-radius: 15px; padding: 40px; margin: 20px 0;">
                    <p style="font-size: 24px; margin-bottom: 20px;">Puntuació Final:</p>
                    <p style="font-size: 48px; color: #FFF30E; font-weight: bold; margin-bottom: 10px;">${puntuacio} punts</p>
                    <p style="font-size: 28px; margin-bottom: 20px;">${ranking}</p>
                    <p style="font-size: 20px; margin-bottom: 30px;">Vides restants: ${vidas} ❤️</p>
                </div>
                <div style="margin-top: 30px; display: flex; gap: 15px; justify-content: center;">
                    <a href="{{ route('pregunta', [$capitulo, 1]) }}" style="background: #FFF30E; color: #000; padding: 15px 40px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 18px; display: inline-block;">Reintentar Capítol</a>
                    <a href="{{ route('mapa') }}" style="background: #28428C; color: #fff; padding: 15px 40px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 18px; display: inline-block;">Tornar a Capitols</a>
                </div>
            </div>
        `;
    }
}
function guardarPuntos(puntosGanados) {
    fetch('{{ route("guardar-puntos") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: JSON.stringify({
            capitulo: {{ $capitulo }},
            puntos: puntosGanados
        })
    }).then(r => r.json()).then(data => {
        console.log('Puntos guardados:', data);
    }).catch(e => {
        console.error('Error guardando puntos:', e);
    });
}
</script>
@endpush