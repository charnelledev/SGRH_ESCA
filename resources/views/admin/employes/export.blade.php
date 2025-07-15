

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
        <span>  Généré le : {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</span>
        <span>  Total des employés : {{ count($employes) }}</span>
    </div>

    <table>
        <thead>
            <tr>
                  <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Région</th>
                <th>Emploi</th>
                <th>Grade</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($employes as $e)
                <tr>
                     <td>{{ $e->last_name }}</td>
                    <td>{{ $e->email }}</td>
                    <td>{{ $e->telephone}}</td>
                    <td>{{ $e->region->name ?? '' }}</td>
                    <td>{{ $e->emploi->titre ?? '' }}</td>
                    <td>{{ $e->grade->nom ?? '' }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Rapport généré automatiquement - ESCA RH
    </div>

</body>
</html>

