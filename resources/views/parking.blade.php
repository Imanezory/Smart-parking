<!DOCTYPE html>

<html lang="fr">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Parkflow - Faculté Ibn Zohr</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {

            font-family: 'Inter', sans-serif;

            background-color: #F4F7FB;

        }



        .parking-slot {

            width: 50px;

            height: 90px;

            border: 2px solid #EAB308;

            /* Yellow border */

            border-top: none;

            display: flex;

            justify-content: center;

            align-items: center;

            border-radius: 0 0 4px 4px;

            color: white;

            font-weight: bold;

            font-size: 0.8rem;

            position: relative;

        }



        .parking-slot.top-row {

            border-top: 2px solid #EAB308;

            border-bottom: none;

            border-radius: 4px 4px 0 0;

        }



        .slot-free {

            background-color: #15803D;

        }



        .slot-occupied {

            background-color: #DC2626;

        }



        .car-icon {

            font-size: 24px;

        }
    </style>

</head>



<body class="text-gray-800">



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
            <a href="/parking" class="bg-blue-600 text-white px-4 py-1.5 rounded-full">Parking</a>
            <a href="/reservations" class="hover:text-blue-600 py-1.5">Mes Réservations</a>
            <a href="/ai" class="hover:text-blue-600 py-1.5">Analyse IA</a>

        </nav>

        <div class="flex items-center gap-4">

            <button class="text-gray-500 hover:text-gray-700">

                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>

                </svg>

            </button>

            <button class="bg-blue-600 text-white px-5 py-2 rounded-full font-medium flex items-center gap-2 hover:bg-blue-700">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>

                </svg>

                Se connecter

            </button>

        </div>

    </header>



    <main class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 lg:grid-cols-3 gap-6">



        <div class="flex flex-col gap-6">

            <div>

                <h2 class="text-4xl font-bold text-gray-900 mb-1">Bienvenue au</h2>

                <h2 class="text-4xl font-bold text-blue-600 mb-4">Parkflow</h2>

                <p class="text-gray-600 text-lg mb-6">Gérez et visualisez les places disponibles en temps réel.</p>

                <div class="flex gap-3">

                    <button class="bg-blue-600 text-white px-6 py-2.5 rounded-full font-medium flex items-center gap-2 shadow-md">

                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>

                        </svg>

                        Voir le parking

                    </button>

                    <button class="bg-white text-gray-700 px-6 py-2.5 rounded-full font-medium border border-gray-200 flex items-center gap-2 shadow-sm">

                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>

                        </svg>

                        Voir sur la carte

                    </button>

                </div>

            </div>



            <div class="bg-white p-4 rounded-2xl shadow-sm flex justify-around text-center mt-2 border border-gray-100">

                <div>

                    <div class="text-blue-600 flex justify-center mb-1"><svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">

                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />

                            <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1v-4.5h2.472a1 1 0 00.866-.5l2.5-4.33A1 1 0 0016 5h-4V4a1 1 0 00-1-1H3z" />

                        </svg></div>

                    <p class="text-xs font-bold">Suivi en temps réel</p>

                </div>

                <div class="border-l border-gray-200 px-4">

                    <div class="text-blue-600 flex justify-center mb-1"><svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">

                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />

                        </svg></div>

                    <p class="text-xs font-bold">Sécurisé</p>

                </div>

                <div class="border-l border-gray-200 pl-4">

                    <div class="text-blue-600 flex justify-center mb-1"><svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">

                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />

                        </svg></div>

                    <p class="text-xs font-bold">Rapide</p>

                </div>

            </div>



            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">

                <h3 class="text-lg font-bold mb-4">Disponibilité</h3>



                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-green-50 rounded-xl p-4 flex flex-col items-center">
                        <div class="flex items-center gap-2">
                            <span class="w-4 h-4 bg-green-500 rounded-full"></span>
                            <span id="count-free" class="text-3xl font-bold text-gray-900">0</span>
                        </div>
                        <p class="text-sm font-medium text-gray-600 mt-1">Places libres</p>
                    </div>

                    <div class="bg-red-50 rounded-xl p-4 flex flex-col items-center">
                        <div class="flex items-center gap-2">
                            <span class="w-4 h-4 bg-red-500 rounded-full"></span>
                            <span id="count-occupied" class="text-3xl font-bold text-gray-900">0</span>
                        </div>
                        <p class="text-sm font-medium text-gray-600 mt-1">Occupées</p>
                    </div>
                </div>
                <script>
                    function updateUI() {
                        const now = new Date();

                        // 1. Logique de mise à jour des slots (Libération automatique)
                        document.querySelectorAll('.countdown').forEach(el => {
                            const endTime = new Date(el.getAttribute('data-end'));
                            const slot = el.closest('.parking-slot');

                            if (endTime <= now) {
                                // Si le temps est fini, on transforme le slot en LIBRE
                                if (slot.classList.contains('slot-occupied')) {
                                    const spotId = slot.id.replace('spot-', '');
                                    const spotNum = slot.getAttribute('data-spot-number');

                                    slot.classList.replace('slot-occupied', 'slot-free');
                                    slot.querySelector('.slot-content').innerHTML = `<a href="/reservation/${spotId}">${spotNum}</a>`;
                                }
                            } else {
                                // Sinon on affiche le temps restant
                                const diff = Math.floor((endTime - now) / 1000);
                                const m = Math.floor(diff / 60);
                                const s = diff % 60;
                                el.innerText = `${m}:${s < 10 ? '0' : ''}${s}`;
                            }
                        });

                        // 2. CALCUL DES COMPTEURS (Ce que tu as demandé)
                        // On compte combien d'éléments ont la classe 'slot-free'
                        const totalFree = document.querySelectorAll('.slot-free').length;
                        // On compte combien d'éléments ont la classe 'slot-occupied'
                        const totalOccupied = document.querySelectorAll('.slot-occupied').length;

                        // On affiche les résultats dans les spans correspondants
                        document.getElementById('count-free').innerText = totalFree;
                        document.getElementById('count-occupied').innerText = totalOccupied;
                    }

                    // Lancer la mise à jour toutes les secondes
                    setInterval(updateUI, 1000);
                    updateUI(); // Appel immédiat au chargement
                </script>



                <button class="w-full bg-blue-600 text-white py-3 rounded-xl font-medium flex justify-center items-center gap-2 hover:bg-blue-700">

                    Réserver une place

                </button>

            </div>

        </div>



        <div class="lg:col-span-2 flex flex-col gap-4">



            <div class="bg-gray-200 h-64 rounded-2xl overflow-hidden relative border border-gray-200">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d430.13604254216955!2d-9.544530950005308!3d30.40523539318081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3c924d34ea5ef%3A0x4295a53f617e6915!2sParking%20de%20FSA!5e0!3m2!1sfr!2sma!4v1776627757986!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <div class="absolute inset-0 flex items-center justify-center">

                    <div class="bg-white px-4 py-2 rounded-lg shadow-lg flex items-center gap-2 font-medium text-sm">

                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">

                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />

                        </svg>

                        Faculté des Sciences<br>Ibn Zohr - Agadir

                    </div>

                </div>

            </div>



            <div class="bg-white p-6 rounded-2xl shadow border">



                <!-- HEADER -->

                <div class="flex justify-between items-center mb-6">

                    <h3 class="text-lg font-bold">

                        État des places ({{ $spots->count() }})

                    </h3>



                    <div class="flex gap-4 text-sm">

                        <span class="text-green-600">🟢 Libre</span>

                        <span class="text-red-600">🔴 Occupée</span>

                    </div>

                </div>



                <!-- PARKING ZONE -->


           <style>
    /* Aspect bitume / goudron */
    .parking-area {
        background-color: #1f2937; /* Gray-800 */
        background-image: radial-gradient(#374151 1px, transparent 1px);
        background-size: 20px 20px; /* Petit grain pour l'effet goudron */
        border: 4px solid #374151;
    }

    .parking-slot {
        position: relative;
        width: 65px;
        height: 110px;
        /* Lignes de marquage jaunes */
        border-left: 3px solid #fbbf24; 
        border-right: 3px solid #fbbf24;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: all 0.3s ease;
    }

    /* Effet de butée de stationnement (le petit bloc au fond) */
    .parking-slot::before {
        content: "";
        position: absolute;
        top: 5px;
        width: 40px;
        height: 6px;
        background: #4b5563;
        border-radius: 2px;
    }

    .slot-free {
        background-color: rgba(21, 128, 61, 0.1); /* Vert très léger */
    }

    .slot-occupied {
        background-color: rgba(220, 38, 38, 0.1); /* Rouge très léger */
    }

    .car-icon {
        font-size: 2rem;
        filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));
        z-index: 10;
    }

    .spot-number-label {
        font-family: 'Monaco', 'Courier New', monospace;
        color: #9ca3af;
        font-size: 0.7rem;
        position: absolute;
        bottom: 5px;
    }
</style>
<div class="parking-area p-10 rounded-3xl shadow-2xl">
    
    <div class="flex flex-wrap gap-6 justify-center border-b-2 border-dashed border-gray-600 pb-12">
        @foreach($spots as $spot)
            @php
                $activeRes = $spot->reservations()
                    ->where('end_time', '>', now())
                    ->orderBy('end_time', 'desc')
                    ->first();
                $isOccupied = $activeRes ? true : false;
            @endphp

            <div class="parking-slot {{ $isOccupied ? 'slot-occupied' : 'slot-free' }}"
                 id="spot-{{ $spot->id }}"
                 data-spot-number="{{ $spot->spot_number }}">

                <div class="slot-content flex flex-col items-center">
                    @if($isOccupied)
                        <span class="car-icon mb-1">🚗</span>
                        <div class="countdown font-mono text-[10px] bg-black/50 text-white px-1 rounded" 
                             data-end="{{ $activeRes->end_time }}">
                            --:--
                        </div>
                    @else
                        <a href="/reservation/{{ $spot->id }}" 
                           class="text-white bg-green-600/80 hover:bg-green-500 px-2 py-1 rounded text-xs font-bold transition-all transform hover:scale-110">
                            LIBRE
                        </a>
                    @endif
                </div>
                
                <span class="spot-number-label">{{ $spot->spot_number }}</span>
            </div>
        @endforeach
    </div>

    <div class="py-6 flex justify-center">
        <div class="text-gray-600 font-bold tracking-[1em] text-xs uppercase">← ZONE DE CIRCULATION →</div>
    </div>
</div>
               <script>
    function updateParkingLogic() {
        const now = new Date();

        document.querySelectorAll('.countdown').forEach(el => {
            const endTime = new Date(el.getAttribute('data-end'));
            const slotElement = el.closest('.parking-slot');
            const slotContent = slotElement.querySelector('.slot-content');

            if (endTime <= now) {
                // 1. Si le temps est écoulé et que la place est encore marquée occupée
                if (slotElement.classList.contains('slot-occupied')) {
                    const spotId = slotElement.id.replace('spot-', '');

                    // 2. Changer les classes pour repasser au VERT
                    slotElement.classList.remove('slot-occupied');
                    slotElement.classList.add('slot-free');

                    // 3. Injecter à nouveau le bouton "LIBRE"
                    slotContent.innerHTML = `
                        <a href="/reservation/${spotId}" 
                           class="text-white bg-green-600/80 hover:bg-green-500 px-2 py-1 rounded text-xs font-bold transition-all transform hover:scale-110">
                            LIBRE
                        </a>
                    `;
                }
            } else {
                // 4. Calcul du temps restant pour l'affichage (MM:SS)
                const diff = Math.floor((endTime - now) / 1000);
                const mins = Math.floor(diff / 60);
                const secs = diff % 60;
                el.innerText = `${mins}:${secs < 10 ? '0' : ''}${secs}`;
            }
        });
    }

    // Lancement du cycle
    setInterval(updateParkingLogic, 1000);
    updateParkingLogic(); // Exécution immédiate au chargement
</script>




                <!-- PARKING ZONE -->
            </div>

        </div>

    </main>



    <footer class="bg-gray-800 text-gray-300 py-4 mt-8 text-sm">

        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4">

            <div class="flex flex-wrap justify-center gap-6">

                <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>

                    </svg> Faculté Ibn Zohr, Agadir</span>

                <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>

                    </svg> +212 6 01 57 87 94</span>

                <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>

                    </svg> contact@parkflow.ma</span>

                <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>

                    </svg> Ouvert 24h/24</span>

            </div>

            <div>

                &copy; 2026 Parkflow - Tous droits réservés

            </div>

        </div>

    </footer>



</body>



</html>