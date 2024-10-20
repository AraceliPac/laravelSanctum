<!DOCTYPE html>
<html>
<head>
    <title>MIS DATOS EN PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        h1 {
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
        table {
            margin-top: 20px;
        }
        th {
            background-color: #007bff; /* Color del encabezado */
            color: white; /* Color del texto del encabezado */
        }
        td {
            vertical-align: middle; /* Centrar verticalmente el contenido */
        }
        .table td, .table th {
            padding: 12px; /* Espacio interno en celdas */
        }
        .table {
            border-collapse: collapse; /* Evita dobles bordes */
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>Fecha: {{ $date }}</p>
    <p>DATOS</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
</body>
</html>
