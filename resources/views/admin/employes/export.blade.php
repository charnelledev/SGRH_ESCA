<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des employés</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .info {
            margin-bottom: 20px;
            font-size: 13px;
        }

        .info span {
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #0a0a0a;
            padding: 6px;
            text-align: left;
        }

        th {
            background: #5b9de9;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-style: italic;
        }
    </style>
</head>
<body>

<h1>Liste des Employés</h1>

<div class="info">
    <span>Généré le : {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</span>
    <span>Total des employés : {{ count($employes) }}</span>
</div>

<table>
    <thead>
        <tr>
            <th width="30" align='center'>Nom</th>
            <th width="30" align='center'>Prenom</th>
            <th width="30" align='center'>Email</th>
            <th width="30" align='center'>Téléphone</th>
            <th width="30" align='center'>Région</th>
            <th width="30" align='center'>Emploi</th>
            <th width="30" align='center'>Grade</th>
            <th width="30" align='center'>salaire minimal</th>
            <th width="30" align='center'>salaire maximal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employes as $e)
            <tr>
                <td>{{ $e->last_name }}</td>
                <td>{{ $e->name }}</td>
                <td>{{ $e->email }}</td>
                <td>{{ $e->telephone }}</td>
                <td>{{ $e->region->nom ?? '' }}</td>
                <td>{{ $e->emploi->titre ?? '' }}</td>
                <td>{{ $e->grade->nom ?? '' }}</td>
                <td>{{ $e->salary_min}}</td>
                <td>{{ $e->salary_max}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="footer">
    Rapport généré automatiquement - ESCA RH
</div>

</body>
</html>
