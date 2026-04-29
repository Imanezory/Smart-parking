<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Réservation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-xl shadow w-96">

        <h2 class="text-xl font-bold mb-4">
            Réserver la place: {{ $spot->spot_number }}
        </h2>

        <form method="POST" action="/reservation">
            @csrf

            <input type="hidden" name="spot_id" value="{{ $spot->id }}">

            <!-- Nom -->
            <input type="text" name="name" placeholder="Votre nom"
                class="w-full border p-2 mb-3 rounded" required>

            <!-- Téléphone -->
            <input type="text" name="phone" placeholder="Téléphone"
                class="w-full border p-2 mb-3 rounded" required>

            <select name="vehicle_type" class="w-full border p-2 mb-3 rounded" required>
                <option value="">Choisir véhicule</option>
                <option value="voiture">🚗 Voiture</option>
                <option value="moto">🏍️ Moto</option>
                <option value="velo">🚲 Vélo</option>
            </select>
            <!-- Début -->
            <label>Heure début</label>
            <input type="datetime-local" name="start"
                class="w-full border p-2 mb-3 rounded" required>

            <!-- Fin -->
            <label>Heure fin</label>
            <input type="datetime-local" name="end"
                class="w-full border p-2 mb-4 rounded" required>

            <!-- BUTTON -->
            <button class="bg-blue-600 text-white w-full py-2 rounded">
                Réserver
            </button>

        </form>

    </div>

</body>

</html>