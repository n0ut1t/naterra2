<div class="ranking" style="margin-top: 0;">
    <h3>Top Exploradors</h3>
    <div id="ranking-widget-list">
        <!-- Loading state or empty -->
        <div class="rank-row"><span class="rank-name">Carregant...</span></div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchWidgetRanking();
        // Use a unique interval ID to avoid conflicts if multiple scripts run? 
        // But since this is a partial included in a page, it should be fine.
        // We might want to check if the interval is already running if this partial is included multiple times (which it shouldn't be).
        if (!window.rankingInterval) {
            window.rankingInterval = setInterval(fetchWidgetRanking, 10000);
        }
    });

    function fetchWidgetRanking() {
        fetch('{{ route("ranking.data") }}')
            .then(response => response.json())
            .then(data => {
                updateWidgetRankingList(data.rankings);
            })
            .catch(error => console.error('Error fetching ranking widget:', error));
    }

    function updateWidgetRankingList(users) {
        const listContainer = document.getElementById('ranking-widget-list');
        if (!listContainer) return;

        listContainer.innerHTML = '';

        // We only want top 3 or so for the widget? The original HTML had 3. 
        // But let's show up to 5 if available, or just take the top 3.
        // The HTML structure in perfil.blade.php showed 3 rows.
        
        users.slice(0, 5).forEach((user, index) => {
            const rank = index + 1;
            const row = document.createElement('div');
            row.className = 'rank-row';
            row.innerHTML = `<span class="rank-name">${rank}. ${user.name}</span><span class="rank-score">${user.puntuacion}</span>`;
            listContainer.appendChild(row);
        });
    }
</script>
@endpush
