@extends('app', [
    'title' => 'Repàs - Naterra',
    'logoStyle' => 'left: 770px; top: 0px;',
    'bodyClass' => 'body_mapa'
])

@section('content')
    <div class="rankings" style="z-index: 9999; height: 550px; width: 900px; left: 50%;">
        <div class="repas-container">
        <div class="repas-title" style="margin-bottom: 0;">Repàs per temes</div>

        <div class="temes-grid" style="z-index: 9999; ">
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(1)">T1 Classificació dels materials</div>
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(2)">T2 Propietats dels materials</div>
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(3)">T3 Propietats tecnològiques</div>
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(4)">T4 Propietats mecàniques</div>

            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(5)">T5 Propietats físiques i químiques</div>
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(6)">T6 Resistència mecànica</div>
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(7)">T7 Propietats sensorials</div>
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(8)">T8 Propietats ecològiques  </div>
        </div>
    </div>
    </div>

    <div id="popupModal" class="modal" style="display: none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.6);">
        <div class="modal-content" style="background-color: white; margin: 5% auto; padding: 30px; border-radius: 8px; width: 80%; max-width: 800px; max-height: 80vh; overflow-y: auto;">
            <span class="close" onclick="cerrarPopup()" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
            <h2 id="popupTitulo">Tema 1</h2>
            <div id="popupContenido">
                </div>
        </div>
    </div>

    <script>
        function abrirPopup(tema) {
            const temas = {
                1: {
                    titulo: 'Tema 1',
                    imagenes: [
                        "{{ asset('img/Tema1.png') }}"
                    ]
                },
                2: {
                    titulo: 'Tema 2',
                    imagenes: [
                        "{{ asset('img/tema2_1.png') }}",
                        "{{ asset('img/tema2_2.png') }}"
                    ]
                },
                3: {
                    titulo: 'Tema 3',
                    imagenes: [
                        "{{ asset('img/tema3.png') }}"
                    ]
                },
                4: {
                    titulo: 'Tema 4',
                    imagenes: [
                        "{{ asset('img/tema4_2.png') }}",
                        "{{ asset('img/tema4.png') }}"
                    ]
                },
                5: {
                    titulo: 'Tema 5',
                    imagenes: [
                        "{{ asset('img/tema4.png') }}"
                    ]
                },
                6: {
                    titulo: 'Tema 6',
                    imagenes: [
                        "{{ asset('img/tema6.png') }}"
                    ]
                },
                7: {
                    titulo: 'Tema 7',
                    imagenes: [
                        "{{ asset('img/tema7.png') }}"
                    ]
                },
                8: {
                    titulo: 'Tema 8',
                    imagenes: [
                        "{{ asset('img/tema8.png') }}"
                    ]
                }
            };

            const temaDatos = temas[tema];
            
            if (temaDatos) {
                document.getElementById('popupTitulo').textContent = temaDatos.titulo;
                
                let html = '';
                temaDatos.imagenes.forEach(img => {
                    html += `<img src="${img}" style="width: 100%; margin: 15px 0; border-radius: 5px;" alt="${temaDatos.titulo}">`;
                });
                
                document.getElementById('popupContenido').innerHTML = html;
                document.getElementById('popupModal').style.display = 'block';
            }
        }

        function cerrarPopup() {
            document.getElementById('popupModal').style.display = 'none';
        }

        // Cerrar modal al hacer clic fuera de él
        window.onclick = function(event) {
            const modal = document.getElementById('popupModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
    