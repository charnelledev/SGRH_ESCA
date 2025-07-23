<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique des employés</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 40px;
            background: linear-gradient(to bottom right, #5b9de9, #b388eb);
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header img {
            height: 100px;
            margin-bottom: 10px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            color: #4B0082;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 20px;
            font-size: 13px;
            color: #222;
        }

        .info span {
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            font-size: 12px;
        }

        th, td {
            border: 2px solid #4B0082;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #5b9de9;
            color: white;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
            font-style: italic;
            color: #333;
        }
    </style>
</head>
<body>

<div class="header">
    <img src="{{ public_path('images/logo_esca.png') }}" alt="Logo ESCA">
    <div class="title">Historique des Employés</div>
</div>

<div class="info">
    <span>Généré le : {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</span>
    <span>Total des historiques : {{ count($historiques) }}</span>
</div>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Emploi</th>
            <th>Grade</th>
            <th>Salaire Min</th>
            <th>Salaire Max</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Créé le</th>
        </tr>
    </thead>
    <tbody>
        @foreach($historiques as $historique)
            <tr>
                <td>{{ $historique->employe->last_name }}</td>
                <td>{{ $historique->employe->name }}</td>
                <td>{{ $historique->employe->email }}</td>
                <td>{{ $historique->emploi->titre ?? '—' }}</td>
                <td>{{ $historique->employe->grade->nom ?? '—' }}</td>
                <td>{{ $historique->employe->salary_min ?? '—' }}</td>
                <td>{{ $historique->employe->salary_max ?? '—' }}</td>
                <td>{{ $historique->date_debut }}</td>
                <td>{{ $historique->date_fin ?? '—' }}</td>
                <td>{{ \Carbon\Carbon::parse($historique->created_at)->format('d/m/Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="footer">
    Rapport généré automatiquement — ESCA RH
</div>

</body>
</html>
