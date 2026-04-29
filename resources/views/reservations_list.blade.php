<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mes Réservations - Parkflow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F4F7FB;
        }
    </style>
</head>

<body class="text-gray-800">

    <!-- HEADER / NAVIGATION -->
    <header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="bg-blue-600 text-white rounded-full w-10 h-10 flex items-center justify-center font-bold text-xl">P</div>
            <div>
                <h1 class="text-xl font-bold text-gray-900 leading-tight">Parkflow</h1>
                <p class="text-xs text-gray-500">Faculté Ibn Zohr - Agadir</p>
            </div>
        </div>
        <nav class="hidden md:flex gap-6 font-medium text-gray-600">
            <a href="/" class="hover:text-blue-600 py-1.5">Accueil</a>
            <a href="/parking" class="hover:text-blue-600 py-1.5">Parking</a>
            <a href="/reservations" class="bg-blue-600 text-white px-4 py-1.5 rounded-full">Mes Réservations</a>
            <a href="/ai" class="hover:text-blue-600 py-1.5">Analyse IA</a>
        </nav>
    </header>

    <!-- CONTENT -->
    <main class="max-w-5xl mx-auto px-4 py-10">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">Liste des Réservations</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 border-b border-gray-200">
                            <th class="p-3 font-semibold text-sm">Place</th>
                            <th class="p-3 font-semibold text-sm">Nom du Conducteur</th>
                            <th class="p-3 font-semibold text-sm">Véhicule</th>
                            <th class="p-3 font-semibold text-sm">Début</th>
                            <th class="p-3 font-semibold text-sm">Fin</th>
                            <th class="p-3 font-semibold text-sm">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($reservations as $res)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 font-bold text-blue-600">{{ $res->parkingSpot->spot_number ?? 'N/A' }}</td>
                            <td class="p-3">{{ $res->name }}<br><span class="text-xs text-gray-500">{{ $res->phone }}</span></td>
                            <td class="p-3 capitalize">{{ $res->vehicle_type }}</td>
                            <td class="p-3 text-sm">{{ \Carbon\Carbon::parse($res->start_time)->format('d/m/Y H:i') }}</td>
                            <td class="p-3 text-sm font-medium">{{ \Carbon\Carbon::parse($res->end_time)->format('d/m/Y H:i') }}</td>
                            <td class="status-cell">
                                @if(now() < $res->end_time)
                                    <span class="status-badge bg-red-100 text-red-600 px-3 py-1 rounded-full font-bold">Occupée</span>
                                    @else
                                    <span class="status-badge bg-green-100 text-green-600 px-3 py-1 rounded-full font-bold">Terminée</span>
                                    @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-500">Aucune réservation trouvée.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
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