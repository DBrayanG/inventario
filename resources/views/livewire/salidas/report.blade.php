<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe de Entradas</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .header { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <h1 class="header">Informe de Salida</h1>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Tipo de Operación</th>
                <th>Agente</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entradas as $entrada)
            <tr>
                <td>{{ $entrada->producto->nombre }}</td>
                <td>{{ $entrada->fecha }}</td>
                <td>{{ $entrada->cantidad }}</td>
                <td>{{ $entrada->tipoOperacion->nombre }}</td>
                <td>{{ $entrada->agente->nombre }}</td>
                <td>{{ $entrada->usuario->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
