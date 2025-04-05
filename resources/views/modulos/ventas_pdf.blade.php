<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Venta #{{ $venta->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Detalles de la Venta</h1>
    <table>
        <tr>
            <th>Cliente</th>
            <td>{{ $venta->cliente->nombre }}</td>
        </tr>
        <tr>
            <th>Empleado</th>
            <td>{{ $venta->empleado->nombre ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Fecha</th>
            <td>{{ $venta->fecha }}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td>{{ $venta->total }}</td>
        </tr>
        <tr>
            <th>Estado</th>
            <td>{{ $venta->estado }}</td>
        </tr>
    </table>
</body>
</html>
