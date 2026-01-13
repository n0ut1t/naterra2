@extends('app', [
    'title' => 'Ranking - Naterra',
    'logoStyle' => 'left: 770px; top: 0px;',
    'bodyClass' => 'body_mapa'
])

@section('content')
    <div class="rankings" style="z-index: 9999; height: 600px;">
        <div class="top3" id="top3-container">
            <!-- Dynamic Content -->
             <div class="top-circle"><img src="{{ asset('img/top1.jpg') }}"><div class="top-pos">1</div></div>
             <div class="top-circle"><img src="{{ asset('img/top2.jpg') }}"><div class="top-pos">2</div></div>
             <div class="top-circle"><img src="{{ asset('img/top3.jpg') }}"><div class="top-pos">3</div></div>
        </div>

        <div class="ranking-box">
            <h3>Ranking Global</h3>
            <div id="ranking-list">
                <div class="rank-row">
                     <span class="rank-name">Carregant...</span>
                </div>
            </div>
        </div>
    </div>

    <div class="right-bar">
        <div class="user">
            <img src="{{ asset('img/avatar.png') }}" class="avatar">
            <div class="user-name" id="current-user-name">{{ Auth::user()->name }}</div>
            <div class="user-rank-info" style="color: white; font-size: 0.9em; margin-top: 5px;">
                Posició: <span id="current-user-rank">-</span> | Punts: <span id="current-user-points">{{ Auth::user()->puntuacion }}</span>
            </div>
        </div>
        <div class="ship">
            <div class="ship-title">La teva nau</div>
            <img src="{{ asset('img/mi_nave.png') }}" class="ship-img">
        </div>
    </div>

    <div class="repas-circle">REPÀS</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchRankingData();
            setInterval(fetchRankingData, 10000); // Actualizar cada 10 segundos
        });

        function fetchRankingData() {
            fetch('{{ route("ranking.data") }}')
                .then(response => response.json())
                .then(data => {
                    updateRankingList(data.rankings);
                    updateCurrentUser(data.user);
                })
                .catch(error => console.error('Error fetching ranking:', error));
        }

        function updateRankingList(users) {
            const listContainer = document.getElementById('ranking-list');
            listContainer.innerHTML = '';

            users.forEach((user, index) => {
                const rank = index + 1;
                const row = document.createElement('div');
                row.className = 'rank-row';
                
                // Highlight current user if needed, or just standard display
                row.innerHTML = `<span class="rank-name">${rank}. ${user.name}</span><span class="rank-score">${user.puntuacion}</span>`;
                listContainer.appendChild(row);
            });
        }

        function updateCurrentUser(userData) {
            document.getElementById('current-user-name').textContent = userData.name;
            document.getElementById('current-user-rank').textContent = userData.rank;
            document.getElementById('current-user-points').textContent = userData.puntuacion;
        }
    </script>
@endsection