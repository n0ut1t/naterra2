@extends('layouts.juego')

@section('title', "Pregunta {$numero} - Capítol {$capitol}")

@section('content')
<div class="pregunta-container">
    <!-- Header con número y vidas -->
    <div class="pregunta-header">
        <div>Pregunta <strong>{{ $numero }}/10</strong></div>
        <div class="vidas">
            <span class="corazon">Cor</span>
            <span class="corazon">Cor</span>
            <span class="corazon">Cor</span>
        </div>
    </div>

    <!-- Texto de la pregunta -->
    <div class="pregunta-texto">
        {{ $pregunta['pregunta'] }}
    </div>

    <!-- 4 respuestas -->
    <div class="respuestas">
        @foreach($pregunta['opciones'] as $i => $opcion)
            <div class="btn-respuesta" data-respuesta="{{ $i }}">
                {{ $opcion }}
            </div>
        @endforeach
    </div>

    <!-- Foto (cambia el src por capítulo si quieres) -->
    <div class="pregunta-imagen">
        <img src="{{ $pregunta['imagen'] ?? 'https://via.placeholder.com/900x250/e0e0e0/999999?text=Teoria+Capítol+' . $capitol }}"
             alt="Imatge de suport">
    </div>

    <!-- Botón siguiente (aparece al responder) -->
    <button id="siguiente-pregunta" style="display: none;">
        Següent Pregunta
    </button>
</div>
@endsection

@section('scripts')
<script>
const correcta = {{ $pregunta['correcta'] }};
let respondida = false;

document.querySelectorAll('.btn-respuesta').forEach(btn => {
    btn.addEventListener('click', function() {
        if (respondida) return;
        respondida = true;

        const seleccionada = this.getAttribute('data-respuesta');
        const esCorrecta = (parseInt(seleccionada) === correcta);

        // Bloquear todos
        document.querySelectorAll('.btn-respuesta').forEach(b => {
            b.style.pointerEvents = 'none';
            b.style.opacity = '0.6';
        });

        // Marcar respuesta
        this.style.background = esCorrecta ? '#00cc00' : '#cc0000';
        this.style.color = 'white';

        // Mostrar botón siguiente
        document.getElementById('siguiente-pregunta').style.display = 'block';
        document.getElementById('siguiente-pregunta').onclick = () => {
            window.location.href = "{{ $siguiente_url }}";
        };

        // Confetti si acierta (si tienes la librería)
        if (esCorrecta && typeof confetti !== 'undefined') {
            confetti();
        }
    });
});
</script>
@endsection