<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            /*font-family: Arial, Helvetica, sans-serif;*/
            padding: 0px;
            margin: 0px;
            border: 0px;
        }
        .page_break { page-break-before: always; }

    </style>
</head>
<body>
@foreach($certificados as $certificado)
    <img src="certificado.jpg" style=" position: absolute;top: 5px;left: 5px;width: 1036px;height: 800px" >
    <div style="border: 1px solid red;position: absolute;top: 310px;left: 100px;text-align: center;font-size: 2.5em; font-weight: bold;width: 850px;height: 35px;font-family: 'Nunito', sans-serif;color: #343c47">{{$certificado['nombres']}}</div>
    <div style="border: 1px solid red;position: absolute;top: 450px;left: 100px;text-align: center;font-size: 0.5em;width: 850px;height: 85px;font-family: 'Nunito', sans-serif;color: #343c47">
        Por su participación en calidad de {{$certificado['tipo']}} de las II JORNADAS DE TECNOLOGIAS DE COMUNICACIÓN 2022” desarrollado del 16 al 18 de noviembre de 2022, con una carga horaria académica de 32 horas lectivas.
    </div>
    <div style="border: 1px solid red;position: absolute;top: 450px;left: 100px;text-align: center;font-size: 0.5em;width: 850px;height: 85px;font-family: 'Nunito', sans-serif;color: #343c47">
        Oruro, Noviembre de 2022
    </div>
    <div style="border: 1px solid red;position: absolute;top: 450px;left: 100px;text-align: center;font-size: 0.5em;width: 850px;height: 85px;font-family: 'Nunito', sans-serif;color: #343c47">
        <table style="width: 100%">
            <tr>
                <td>MSc. Ing. Gregorio Fernando Ureña Merida<br>COORDINADOR ACADEMIA REGIONAL<br>CISCO SIS-FNI-UTO</td>
                <td>MSc. Ing. Franz Chinche Imaña<br>DIRECTOR DE CARRERA<br>ING. DE SISTEMAS E ING. INFORMATICA</td>
                <td>MCs. Ing. Julio Cesar Bermudez Vargas<br>VICEDECANO<br>FACULTAD NACIONAL DE INGENIERIA</td>
            </tr>
        </table>
    </div>
    <img src="data:image/png;base64, {!! $certificado['qr'] !!}" style="border:2px solid white;position: absolute;top: 575px;right: 150px;width: 90px;height: 90px">
    <div class="page_break"></div>
{{--    @if($loop->index%2==0)--}}
{{--        <img src="folleto.jpg" style="  position: absolute;top: 5px;left: 5px;width: 518px;height: 800px" >--}}
{{--        <img src="data:image/png;base64, {!! $cupo['qr'] !!}" style="border:2px solid white;position: absolute;top: 575px;left: 420px;width: 90px;height: 90px">--}}
{{--        <div style="position: absolute;top: 753px;left: 490px; font-weight: bold;width: 85px;height: 85px;font-family: 'Nunito', sans-serif;color: #a0aec0">{{$cupo['id']}}</div>--}}
{{--    @else--}}
{{--        <img src="folleto.jpg" style="  position: absolute;top: 5px;right: 5px;width: 518px;height: 800px" >--}}
{{--        <img src="data:image/png;base64, {!! $cupo['qr'] !!}" style="border:2px solid white;position: absolute;top: 575px;right: 25px;width: 90px;height: 90px">--}}
{{--        <div style="position: absolute;top: 753px;right: -50px; font-weight: bold;width: 85px;height: 85px;font-family: 'Nunito', sans-serif;color: #a0aec0">{{$cupo['id']}}</div>--}}
{{--        <div class="page_break"></div>--}}
{{--    @endif--}}
@endforeach
</body>
</html>
