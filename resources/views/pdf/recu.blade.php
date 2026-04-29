@php
    $start = \Carbon\Carbon::parse($reservation->start_time);
    $end = \Carbon\Carbon::parse($reservation->end_time);
    $minutes = $start->diffInMinutes($end);
@endphp

@php
    $price = ceil($minutes / 5) * 1;
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Reçu ParkFlow</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            background:#f3f4f6;
            padding:40px;
            color:#111827;
        }

        .container{
            background:white;
            border-radius:20px;
            padding:35px;
            box-shadow:0 0 20px rgba(0,0,0,0.08);
        }

        .header{
            text-align:center;
            margin-bottom:35px;
        }

        .logo{
            width:90px;
            height:90px;
            border-radius:50%;
            background:#1d4ed8;
            color:white;
            margin:auto;
            line-height:90px;
            font-size:42px;
            font-weight:bold;
            box-shadow:0 4px 10px rgba(37,99,235,0.4);
        }

        .title{
            font-size:38px;
            font-weight:bold;
            margin-top:15px;
            color:#111827;
        }

        .subtitle{
            color:#6b7280;
            font-size:15px;
            margin-top:5px;
        }

        .receipt-title{
            text-align:center;
            margin-top:30px;
            margin-bottom:25px;
            font-size:24px;
            font-weight:bold;
            color:#2563eb;
        }

        table{
            width:100%;
            border-collapse: collapse;
            overflow:hidden;
            border-radius:12px;
        }

        td{
            padding:16px;
            border-bottom:1px solid #e5e7eb;
        }

        td:first-child{
            background:#eff6ff;
            font-weight:bold;
            width:40%;
            color:#1d4ed8;
        }

        .highlight{
            margin-top:25px;
            background:#dbeafe;
            color:#1e40af;
            padding:18px;
            border-radius:12px;
            text-align:center;
            font-size:18px;
            font-weight:bold;
        }

        .status{
            margin-top:20px;
            text-align:center;
        }

        .badge{
            display:inline-block;
            background:#dcfce7;
            color:#166534;
            padding:10px 18px;
            border-radius:30px;
            font-size:14px;
            font-weight:bold;
        }

        .footer{
            margin-top:35px;
            text-align:center;
            color:#6b7280;
            font-size:14px;
        }

        .line{
            margin-top:25px;
            height:2px;
            background:#e5e7eb;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">

        <div class="logo">
            P
        </div>

        <div class="title">
            Parkflow
        </div>

        <div class="subtitle">
            Faculté Ibn Zohr - Agadir
        </div>

    </div>

    <div class="receipt-title">
        Reçu de Réservation
    </div>

    <table>

        <tr>
            <td>Nom du Conducteur</td>
            <td>{{ $reservation->name }}</td>
        </tr>

        <tr>
            <td>Téléphone</td>
            <td>{{ $reservation->phone }}</td>
        </tr>

        <tr>
            <td>Type de Véhicule</td>
            <td>{{ $reservation->vehicle_type }}</td>
        </tr>

        <tr>
            <td>Place Réservée</td>
            <td>{{ $reservation->parkingSpot->spot_number }}</td>
        </tr>

        <tr>
            <td>Date Début</td>
            <td>{{ $start->format('d/m/Y H:i') }}</td>
        </tr>

        <tr>
            <td>Date Fin</td>
            <td>{{ $end->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
    <td>Prix</td>
    <td>{{ $price }} DH</td>
</tr>

    </table>

    <div class="highlight">
        Temps utilisé : {{ $minutes }} minutes
    </div>

    <div class="status">
        <span class="badge">
            Réservation Confirmée !
        </span>
    </div>

    <div class="line"></div>
    <div class="footer">
        Merci d'utiliser ParkFlow !  <br>
    </div>

</div>

</body>
</html>