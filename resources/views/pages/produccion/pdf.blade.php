
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
        /* Estilos del apartado de firma */
        .firma {
            margin-top: 440px;
            text-align: center;
        }

        .firma p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{$imagePath}}" width="100px" height="90px" >
        <h1 class="title">Planta Industrial Garcia y Jaramillo SRL</h1>
    </div>
    <h3 class="subtitle">Balance de Rendimiento</h3>

    <div class="fields">
        <p>Lote:  {{$exports->lote}}</p>
        <p>Fecha: {{$exports->fecha}}</p>
    </div>

    <table class="default">
        <tbody>
            <tr>
                <th colspan="4" class="text-center">%RENDIMIENTO</th>
            </tr>
            <tr>
                <th>#</th>
                <th>MATERIA</th>
                <th>KG</th>
                <th>%</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Soya</td>
                <td>{{$exports->secado}}</td>
                <td>100%</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Agua</td>
                <td>{{$exports->agua2}}</td>
                <td>{{$exports->aguaP2}}%</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Aceite</td>
                <td>{{$exports->aceite}}</td>
                <td>{{$exports->aceiteP}}%</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Harina</td>
                <td>{{$exports->harina}}</td>
                <td>{{$exports->solventeP}}%</td>
            </tr>
        </tbody>
    </table>

    <div class="firma">
        <p>Carlos Enrique Mamani</p>
        <p>Encargado de Planta</p>
    </div>
    
        
</body>
</html>