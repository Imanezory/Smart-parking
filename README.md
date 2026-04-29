# Parkflow - Système Intelligent de Gestion de Parking

Parkflow (anciennement Smart Parking) est une application web innovante permettant la gestion en temps réel des places de parking pour la Faculté des Sciences Ibn Zohr d'Agadir. L'application combine une interface web robuste construite avec Laravel, et un puissant moteur d'Intelligence Artificielle en Python (FastAPI).

## Architecture du Projet

Le projet est divisé en deux parties fonctionnant en parfaite synergie :
- **Frontend / Backend Web :** Construit avec **Laravel 10+** et **Tailwind CSS**. Il permet aux utilisateurs de s'inscrire, visualiser les places de parking sur une carte ou une grille virtuelle, et effectuer des réservations fiables.
- **Moteur IA (AI Engine) :** Construit avec **Python** et **FastAPI**. Il tourne en arrière-plan et injecte de la donnée intelligente à l'interface via des requêtes HTTP.

## Modules d'Intelligence Artificielle Intégrés

Le cœur intelligent de Parkflow ("Analyse IA") s'appuie sur trois scénarios majeurs offrant une grande valeur ajoutée :

### 1. Prédiction d'Occupation ML (Anticipation de 30 min)
Le système n'affiche pas uniquement l'occupation actuelle, il est capable de regarder dans l'avenir !
* **Technologie :** Modèles d'Ensemble (Random Forest) et Réseaux de Neurones Récurrents (LSTM) entraînés sur l'historique d'utilisation.
* **Valeur ajoutée :** Un conducteur sait avant même de démarrer s'il aura de la place ou non à son arrivée, lissant ainsi les pics d'affluence et diminuant la pollution liée à la recherche de stationnement. La précision visée dépasse les 92%.

### 2. Vision par Ordinateur (Détection Caméras en Direct)
Parkflow remplace les capteurs physiques (IoT) onéreux intégrés dans le goudron par de l'analyse visuelle de caméras IP.
* **Technologie :** Convolutional Neural Networks (CNN - comme YOLO/ResNet simulé) pour analyser les flux vidéo en direct.
* **Valeur ajoutée :** Une solution incroyablement "scalable" et économique. Une seule caméra de vidéosurveillance peut surveiller simultanément jusqu'à 20 places, mettant à jour le statut du parking en temps réel pour une fraction du coût d'un système IoT classique.

### 3. IA Adaptative (Apprentissage et Recalibration en continu)
L'algorithme ne reste pas figé. Il s'adapte aux changements constants de la réalité.
* **Technologie :** Feedback Loop interactif.
* **Valeur ajoutée :** Si un gardien ou un capteur signale une erreur (ex: une place affichée libre mais en fait occupée), le module de recalibration ajuste automatiquement les poids synaptiques et les seuils de tolérance du modèle, assurant que le système gagne en précision et en fiabilité au fil du temps sans intervention coûteuse de développeurs.

## Commandes et Déploiement

Pour tout lancer harmonieusement (Laravel, Vite pour le frontend statique, et le serveur FastAPI Python localisé sur le port `8001`), utilisez la commande magique incluse grâce à `concurrently` :

```bash
npm run dev-all
```

Visitez ensuite les routes principales pour tout explorer :
- `http://localhost:8000/parking` -> L'interface de réservation des places.
- `http://localhost:8000/reservations` -> Liste de vos historiques.
- `http://localhost:8000/ai` -> Le tableau de bord analytique présentant l'activité des modèles IA !
