<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>INFORME DEL PROCESAMIENTO DE SOYA</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif; /* Cambio de fuente a Times New Roman */
            font-size: 12px; /* Cambio de tamaño de fuente a 12 */
            padding: 30px;
        }

        h1 {
            text-transform: uppercase;
            text-align: center; /* Centro el título */
            font-weight: bold; /* Hago el título en negrita */
        }
        h2 {
            text-align: center; /* Centro el subtítulo */
            text-decoration: underline; /* Agrego subrayado */
        }

        .señalador {
            display: inline-block;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid black;
            margin-right: 5px;
        }

        .tabla-container {
            text-align: center; /* Centro la tabla */
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto; /* Centra la tabla horizontalmente */
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        
        p {
            font-size: 16px;
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
    <div style="display: flex; align-items: center">
        <img src="{{$imagePath}}" width="80px" height="70px" style="margin-right: 10px;">
        <h2 style="text-align: center; color: gray; margin-top: -40px">PLANTA INDUSTRIAL GARCIA Y JARAMILLO SRL. </h2>
    </div>

    <h2>INFORME DEL PROCESAMIENTO DE SOYA DE {{$data->granoDeSoya}} DE {{$data->fecha}}</h2>


    <div class="señalador"></div>
    <h2 style="text-align:left ">DATOS DE LA MATERIA PRIMA:</h2>
    <div class="tabla-container"> <!-- Contenedor de la tabla -->
        <table>
            <tr style="background: #D0CECE;">
                <th>DATOS</th>
                <th>CANTIDAD</th>
            </tr>
            <tr>
                <td>Soya en grano</td>
                <td>{{$data->granoDeSoya}} kg</td>
            </tr>
            <tr>
                <td>% Humedad</td>
                <td>{{$data->humedadGrano}}%</td>
            </tr>
            <tr>
                <td>% Grasa</td>
                <td>{{$data->grasaGrano}}%</td>
            </tr>
        </table>
    </div>
    <p>Se recepcionó la materia prima (grano de soya), con una humedad de {{$hume}} la cual fue depositada en el silo 4 para su posterior secado.</p>
    <br>

    <h2 style="text-align:left ">DESCUENTO POR SECADO Y MANIPULEO</h2>
    <div class="tabla-container"> <!-- Contenedor de la tabla -->
        <table>
            <tr style="background: #D0CECE;">
                <th>DATOS</th>
                <th>CANTIDAD</th>
            </tr>
            <tr>
                <td>Soya en grano ingresado</td>
                <td>{{$data->granoDeSoya}}kg</td>
            </tr>
            <tr>
                <td>Merma</td>
                <td>{{$data->merma}}Kg</td>
            </tr>
            <tr>
                <td>Total de soya procesada</td>
                <td>{{$data->secado}}kg</td>
            </tr>
        </table>
    </div>
    <p>Se realizó el debido descuento de {{$resulPor}}% a la soya por la humedad {{$hume}} , la cual se debe acondicionar prosiguiendo 
        por el secado hasta obtener una humedad de soya (10,3%).</p>
        <br>

        <h2 style="text-align:left ">DATOS OBTENIDOS DEL PROCESAMIENTO DE LA SOYA.</h2>
    <div class="tabla-container"> <!-- Contenedor de la tabla -->
        <table>
            <tr style="background: #D0CECE;">
                <th>DATOS</th>
                <th>CANTIDAD</th>
                <th>%RENDIMIENTO</th>
            </tr>
            <tr>
                <td>Soya en grano</td>
                <td>{{$data->secado}}kg</td>
                <td>100%</td>
            </tr>
            <tr>
                <td>Solvente</td>
                <td>{{$data->harina}}kg</td>
                <td>{{$data->solventeP}}%</td>
            </tr>
            <tr>
                <td>Aceite</td>
                <td>{{$data->aceite}}kg</td>
                <td>{{$data->aceiteP}}%</td>
            </tr>
            <tr>
                <td>Agua</td>
                <td>{{$data->agua2}}kg</td>
                <td>{{$data->aguaP2}}%</td>
            </tr>
        </table>
    </div>
    <p>Los rendimientos de los subproductos fueron; solvente {{$data->solventeP}}% y aceite crudo {{$data->aceiteP}}%. 
        Y el aprovechamiento que se obtuvo del {{$data->secado}}kg de soya fue de {{$aprovechamiento}}%.</p>

    <h2 style="text-align:left ">DETERMINACIÓN DEL COSTO TOTAL DE PRODUCCION Y POR BOLSA (50KG).</h2>
    <div class="tabla-container"> <!-- Contenedor de la tabla -->
    <table>
        <tr style="background: #FFD966; ">
            <th colspan="3" style="text-align: center;">COSTO TOTAL</th>
        </tr>
        <tr style="background: #FFF2CC">
            <th>DATOS</th>
            <th>CANTIDAD</th>
            <th>COSTO</th>
        </tr>

        <tr>
            <td>Soya en grano</td>
            <td> </td>
            <td></td>
        </tr>
        <tr>
            <td rowspan="4">Gas licuado</td>
            <td>{{$data->gasLicuado}}kg</td>
            <td>Bs {{$data->costoGasLicuado}}</td>
        </tr>
        <tr>
            <td>Personal ({{$data->personal}})</td>
            <td>Bs {{$data->costoPersonal}}</td>
        </tr>
        <tr>
            <td>Electricidad ({{$data->electricidad}}kwh)</td>
            <td>Bs {{$data->costoElectricidad}}</td>
        </tr>
        <tr>
            <td style=" font-weight: bold;">Total</td>
            <td style="font-weight: bold;">Bs {{$data->total}}</td>
        </tr>

        <tr>
            <td>Electricidad</td>
            <td>{{$data->electricidad2}}kwh</td>
            <td>Bs {{$data->costoElectricidad2}}</td>
        </tr>

        <tr>
            <td>Bolsas</td>
            <td>{{$data->bolsas}} unidades</td>
            <td>Bs {{$data->costoBolsas}}</td>
        </tr>

        <tr>
            <td colspan="2" style="font-weight: bold;">TOTAL</td>
            <td style="font-weight: bold;">Bs {{$data->costo_total}}</td>
        </tr>
    </table>
    </div>
    <p>El costo total del procesamiento de soya del lote 
        {{$data->lote}} es de {{$data->costo_total}} bs, en la cual no intervienen el gasto
         en el personal de trabajo y mantenimiento de los equipos.</p>

    <div class="firma">
        <p>Israel Torrez Esposo</p>
        <p>Encargado de Planta</p>
    </div>
        
        
        
</body>
</html>
