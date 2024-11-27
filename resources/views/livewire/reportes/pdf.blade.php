<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Operaciones</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Informe de Operaciones</h1>
    <p><strong>Fecha Inicio:</strong> {{ $fechaInicio }}</p>
    <p><strong>Fecha Fin:</strong> {{ $fechaFin }}</p>
    <p><strong>Tipo de Operación:</strong> {{ $tipoOperacion }}</p>
    <p><strong>Total Cantidad:</strong> {{ $totalCantidad }}</p>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Tipo Operación</th>
                <th>Agente</th>
            </tr>
        </thead>
        <tbody>
            @foreach($operaciones as $operacion)
                <tr>
                    <td>{{ $operacion->producto->nombre }}</td>
                    <td>{{ $operacion->fecha }}</td>
                    <td>{{ $operacion->cantidad }}</td>
                    <td>{{ $operacion->tipoOperacion->nombre }}</td>
                    <td>{{ $operacion->agente->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
