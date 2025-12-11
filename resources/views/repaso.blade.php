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
            <!-- COLUMNA 1 -->
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(1)">Tema 1</div>
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(2)">Tema 2</div>
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(3)">Tema 3</div>
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(4)">Tema 4</div>

            <!-- COLUMNA 2 -->
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(5)">Tema 5</div>
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(6)">Tema 6</div>
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(7)">Tema 7</div>
            <div class="tema-box" style="height: 100px;" onclick="abrirPopup(8)">Tema 8</div>
        </div>
    </div>
    </div>

    <!-- MODAL POPUP -->
    <div id="popupModal" class="modal" style="display: none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.6);">
        <div class="modal-content" style="background-color: white; margin: 5% auto; padding: 30px; border-radius: 8px; width: 80%; max-width: 800px; max-height: 80vh; overflow-y: auto;">
            <span class="close" onclick="cerrarPopup()" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
            <h2 id="popupTitulo">Tema 1</h2>
            <div id="popupContenido">
                <!-- Las imágenes se cargarán aquí -->
            </div>
        </div>
    </div>

    <script>
        function abrirPopup(tema) {
            const temas = {
                1: {
                    titulo: 'Tema 1',
                    imagenes: [
                        '/img/tema1-1.jpg',
                        '/img/tema1-2.jpg',
                        '/img/tema1-3.jpg'
                    ]
                },
                2: {
                    titulo: 'Tema 2',
                    imagenes: [
                        '/img/tema2-1.jpg',
                        '/img/tema2-2.jpg'
                    ]
                },
                3: {
                    titulo: 'Tema 3',
                    imagenes: [
                        '/img/tema3-1.jpg'
                    ]
                },
                4: {
                    titulo: 'Tema 4',
                    imagenes: [
                        '/img/tema4-1.jpg'
                    ]
                },
                5: {
                    titulo: 'Tema 5',
                    imagenes: [
                        '/img/tema5-1.jpg'
                    ]
                },
                6: {
                    titulo: 'Tema 6',
                    imagenes: [
                        '/img/tema6-1.jpg'
                    ]
                },
                7: {
                    titulo: 'Tema 7',
                    imagenes: [
                        '/img/tema7-1.jpg'
                    ]
                },
                8: {
                    titulo: 'Tema 8',
                    imagenes: [
                        '/img/tema8-1.jpg'
                    ]
                }
            };

            const temaDatos = temas[tema];
            document.getElementById('popupTitulo').textContent = temaDatos.titulo;
            
            let html = '';
            temaDatos.imagenes.forEach(img => {
                html += `<img src="${img}" style="width: 100%; margin: 15px 0; border-radius: 5px;" alt="${temaDatos.titulo}">`;
            });
            
            document.getElementById('popupContenido').innerHTML = html;
            document.getElementById('popupModal').style.display = 'block';
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
    
@endsection