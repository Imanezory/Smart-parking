<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Analyse IA - Parkflow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F4F7FB; }
        .blinking { animation: blinker 2s linear infinite; }
        @keyframes blinker { 50% { opacity: 0.3; } }
    </style>
</head>
<body class="text-gray-800">

    <!-- HEADER -->
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
            <a href="/reservations" class="hover:text-blue-600 py-1.5">Mes Réservations</a>
            <a href="/ai" class="bg-blue-600 text-white px-4 py-1.5 rounded-full">Analyse IA</a>
        </nav>
    </header>

    <!-- DASHBOARD -->
    <main class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- 1. ML PREDICTION -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-bold text-blue-600">Prédiction ML (30 Min)</h2>
                <span class="relative flex h-3 w-3"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span><span class="relative inline-flex rounded-full h-3 w-3 bg-blue-600"></span></span>
            </div>
            <p class="text-sm text-gray-500">Modèle analytique prévoyant la disponibilité avec une haute précision.</p>
            
            <div class="mt-2 bg-gray-50 p-4 rounded-xl border border-gray-200">
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600 text-sm">Précision du Modèle:</span>
                    <span class="text-emerald-600 font-bold" id="pred-accuracy">--.--%</span>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <span class="text-sm font-medium">Status dans 30 min:</span>
                    <span id="pred-status" class="px-3 py-1 bg-gray-200 rounded text-sm font-bold tracking-widest text-gray-500">CHARGEMENT...</span>
                </div>
            </div>
            <button onclick="fetchPrediction()" class="mt-auto w-full bg-blue-600 text-white py-3 rounded-xl font-medium hover:bg-blue-700 transition">Actualiser la Prédiction</button>
        </div>

        <!-- 2. COMPUTER VISION -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 lg:col-span-2 flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-900">Vision par Ordinateur (Caméras Live)</h2>
                <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded border border-red-200 font-bold blinking">● EN DIRECT</span>
            </div>
            <p class="text-sm text-gray-500">Détection intelligente des véhicules temps réel via flux vidéo simulé.</p>
            
            <div class="mt-2 grid grid-cols-2 md:grid-cols-5 gap-3" id="vision-feed-container">
                <!-- Spots injected via JS -->
            </div>
        </div>

        <!-- 3. ADAPTIVE AI -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 lg:col-span-3">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-lg font-bold text-gray-900">Apprentissage Continu (IA Adaptative)</h2>
            </div>
            <p class="text-sm text-gray-500 mb-6">Ajustement du système suite à un retour utilisateur sur le terrain.</p>
            
            <div class="bg-gray-800 p-4 rounded-xl font-mono text-sm text-emerald-400 h-32 overflow-y-auto mb-4 border border-gray-700 shadow-inner" id="ai-console">
                > Moteur d'apprentissage initialisé... OK<br>
                > En attente d'anomalies signalées...
            </div>
            
            <button onclick="triggerRecalibration()" class="bg-green-600 text-white px-6 py-2.5 rounded-full font-medium border border-green-700 hover:bg-green-700 flex items-center gap-2 shadow-sm transition">
                ⚡ Lancer l'Apprentissage
            </button>
        </div>

    </main>

    <script>
        const API_BASE = "http://127.0.0.1:8001/api";

        // Fetch ML Prediction
        async function fetchPrediction() {
            try {
                document.getElementById('pred-status').innerText = "CALCUL...";
                const res = await fetch(`${API_BASE}/predict`);
                const data = await res.json();
                
                document.getElementById('pred-accuracy').innerText = (data.accuracy * 100).toFixed(2) + "%";
                const statusSpan = document.getElementById('pred-status');
                
                if(data.prediction === "FREE") {
                    statusSpan.className = "px-3 py-1 bg-green-100 border border-green-200 text-green-700 rounded text-sm font-bold tracking-widest";
                    statusSpan.innerText = "LIBRE";
                } else {
                    statusSpan.className = "px-3 py-1 bg-red-100 border border-red-200 text-red-700 rounded text-sm font-bold tracking-widest";
                    statusSpan.innerText = "OCCUPÉE";
                }
            } catch(e) {
                console.error(e);
            }
        }

        // Fetch Camera Feed
        async function fetchVisionFeed() {
            try {
                const res = await fetch(`${API_BASE}/vision-feed`);
                const data = await res.json();
                const container = document.getElementById('vision-feed-container');
                container.innerHTML = "";
                
                data.feed.forEach(spot => {
                    const isOcc = spot.status === "OCCUPIED";
                    const colorClasses = isOcc ? "bg-red-50 border-red-200" : "bg-green-50 border-green-200";
                    const icon = isOcc ? "🚗" : "Libre";
                    const iconClass = isOcc ? "text-3xl" : "text-sm font-bold text-green-700";
                    const conf = (spot.confidence * 100).toFixed(1);
                    
                    container.innerHTML += `
                        <div class="border rounded-xl p-3 flex flex-col items-center justify-center h-24 relative overflow-hidden ${colorClasses}">
                            <span class="absolute top-1 left-2 text-xs font-bold text-gray-500">${spot.spot}</span>
                            <span class="mt-2 ${iconClass}">${icon}</span>
                            <span class="text-[10px] text-gray-400 mt-auto">Fiabilité: ${conf}%</span>
                        </div>
                    `;
                });
            } catch (e) { console.error(e); }
        }

        // Trigger Recalibration
        async function triggerRecalibration() {
            const cons = document.getElementById('ai-console');
            cons.innerHTML += `<br>> <strong>Alerte: Mismatch signalé!</strong> Re-calcul des arbres de décision...`;
            cons.scrollTop = cons.scrollHeight;
            
            try {
                const res = await fetch(`${API_BASE}/recalibrate`, { method: 'POST' });
                const data = await res.json();
                setTimeout(() => {
                    cons.innerHTML += `<br>> <span class="text-amber-300">${data.message} ${data.accuracy_improvement}</span>`;
                    cons.scrollTop = cons.scrollHeight;
                }, 1000);
            } catch(e) { console.error(e); }
        }

        // Initial Loads & Loops
        fetchPrediction();
        fetchVisionFeed();
        setInterval(fetchVisionFeed, 3000);

    </script>
</body>
</html>
