
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
        <p>Lote:  {{$exports->lote}}</p>
        <p>Fecha: {{$exports->fecha}}</p>
    </div>

    <table class="default">
    <tr>
        <th colspan="4" class="text-center">%RENDIMIENTO</th></tr>
                            <tr>
                                <th>#</th>
                                <th>MATERIA</th>
                                <th>KG</th>
                                <th>%</th>
                            
                            </tr>
                            <tr>
                            <td>1</td>
                            <td>Soya</td>
                            <td>{{$exports->granoDeSoya}}</td>
                            <td>100%</td>
                            </tr>
                            <tr>
                            <td>2</td>
                            <td>Merma</td>
                            <td>{{$exports->merma}}</td>
                            <td>{{$exports->mermaP}}%</td>
                            </tr>
                            <tr>
                            <td>3</td>
                            <td>Agua</td>
                            <td>{{$exports->agua}}</td>
                            <td>{{$exports->aguaP}}%</td>
                            </tr>
                            <tr>
                            <td>4</td>
                            <td>Soya Final</td>
                            <td>{{$exports->secado}}</td>
                            <td>{{$exports->secadoP}}%</td>
                            </tr>
                        </tbody>
                    </table>
    
        
</body>
</html>