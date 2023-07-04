
<!DOCTYPE html>
<html>
<head>
    <style>
        /* Estilos de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
        }

        /* Estilos del encabezado */
        .header {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 100px;
        }

        .title {
            flex-grow: 1;
            text-align: center;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Estilos de los campos adicionales */
        .fields {
            margin-bottom: 10px;
        }

        .fields p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <img class="" src="{{ public_path('images/logo.png') }}" alt="Logo">
        <h1 class="title">Planta Industrial Garcia y Jaramillo SRL</h1>
    </div>
    <h3 class="subtitle">Balance de Rendimiento</h3>

    <div class="fields">
        <p>Lote: Número de lote</p>
        <p>Fecha: Fecha del balance</p>
    </div>

    <table class="default">
    <tr>
        <th></th>
        <th colspan="2">Mike</th>
        <th colspan="2">Tara</th>
    </tr>
    <tr>
        <th></th>
        <th>Primera prueba</th>

        <th>Segunda prueba</th>

        <th>Primera prueba</th>

        <th>Segunda prueba</th>

    </tr>
    @foreach ($produccions as $produccion)
    <tr>
        <td>{{ $produccion->lote }}</td>

    </tr>
    @endforeach
    </table>
    
        
</body>
</html>