<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin - Smart Parking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

    <h1 class="text-3xl font-bold mb-6">📊 Admin Dashboard</h1>

    <table class="w-full bg-white shadow rounded-xl overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3">Place</th>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Véhicule</th>
                <th class="p-3">Début</th>
                <th class="p-3">Fin</th>
                <th class="p-3">Temps restant</th>
                <th class="p-3">Statut</th>
            </tr>
        </thead>

        <tbody>
            @foreach($reservations as $res)
            <tr class="text-center border-t reservation-row" id="row-{{ $res->id }}">
                <td class="p-3 font-bold">
                    {{ $res->parkingSpot->spot_number }}
                </td>
                <td>{{ $res->name }}</td>
                <td>{{ $res->phone }}</td>
                <td>{{ $res->vehicle_type }}</td>
                <td class="text-xs">{{ $res->start_time }}</td>
                <td class="text-xs">{{ $res->end_time }}</td>

                <td>
                    <span class="countdown font-mono font-bold text-blue-600"
                        data-end="{{ $res->end_time }}">
                        ...
                    </span>
                </td>

                <td class="status-cell">
                    @if(now() < $res->end_time)
                        <span class="status-badge bg-red-100 text-red-600 px-3 py-1 rounded-full font-bold">Occupée</span>
                    @else
                        <span class="status-badge bg-green-100 text-green-600 px-3 py-1 rounded-full font-bold">Terminée</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function updateCountdown() {
            document.querySelectorAll('.reservation-row').forEach(row => {
                const countdownEl = row.querySelector('.countdown');
                const statusCell = row.querySelector('.status-cell');
                
                let end = new Date(countdownEl.dataset.end).getTime();
                let now = new Date().getTime();
                let diff = end - now;

                if (diff <= 0) {
                    // Mise à jour du texte countdown
                    countdownEl.innerHTML = "⏰ fini";
                    countdownEl.classList.remove('text-blue-600');
                    countdownEl.classList.add('text-gray-400');

                    // CORRECTION : Mise à jour du badge de statut en temps réel
                    const badge = statusCell.querySelector('.status-badge');
                    if (badge && badge.innerText === "Occupée") {
                        badge.innerText = "Terminée";
                        badge.classList.remove('bg-red-100', 'text-red-600');
                        badge.classList.add('bg-green-100', 'text-green-600');
                    }
                } else {
                    let minutes = Math.floor(diff / 60000);
                    let seconds = Math.floor((diff % 60000) / 1000);
                    countdownEl.innerHTML = minutes + "m " + seconds + "s";
                }
            });
        }

        setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>

</body>
</html>