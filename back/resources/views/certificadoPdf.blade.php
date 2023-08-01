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
            font-family:"Calibri, sans-serif";
        }
        .page_break { page-break-before: always; }

    </style>
</head>
<body>
@foreach($certificados as $certificado)
    @if($certificado['fondo']=='SI')
        <img src="WhatsApp Image 2023-07-31 at 21.05.44.jpeg" style=" position: absolute;top: 0px;left: 0px;width: 1056px;height: 816px" >
    @endif
    <div style="border: 0px solid red;position: absolute;top: 255px;left: 110px;text-align: center;font-size: 2.8em; font-weight: bold;width: 870px;height: 35px;font-family: 'Nunito', sans-serif;color: #343c47">{{$certificado['titulo']}}</div>
    <div style="border: 0px solid red;position: absolute;top: 325px;left: 90px;text-align: center;font-size: 1.8em; font-weight: bold;width: 900px;height: 35px;font-family: 'Nunito', sans-serif;color: #343c47">A: {{$certificado['nombres']}}</div>
    <div style="border: 0px solid red;position: absolute;top: 380px;left: 120px;text-align: justify;font-size: 1em;width: 850px;height: 85px;font-family: 'Nunito', sans-serif;color: #343c47">
        Por su participación en calidad de <span style="font-size: 1.5em;font-weight: bold;">{{$certificado['tipo']}}</span> del Evento <span style="font-size: 1.5em;font-weight: bold;">“PyhtonDay 2023”</span> desarrollado el 2 de agosto de 2023 con las siguientes temáticas:
        <br>
        <div style="padding: 20px;padding-left: 250px">
            <ul>
                <li>Python Aplicado a la Ciencia de la Ingenieria</li>
                <li>Python Aplicado al Internet de las Cosas</li>
            </ul>
        </div>
    </div>
    <div style="border: 0px solid red;position: absolute;top: 510px;left: 150px;text-align: left;font-size: 1em;width: 850px;height: 85px;font-family: 'Nunito', sans-serif;color: #343c47">
        con una carga horaria académica de 10 horas lectivas.
    </div>
    <div style="border: 0px solid red;position: absolute;top: 520px;right: 120px;text-align: right;font-size: 1em;width: 850px;height: 85px;font-family: 'Nunito', sans-serif;color: #343c47">
        Oruro, Agosto de 2023
    </div>
    <div style="border: 0px solid red;position: absolute;top: 575px;left: 120px;text-align: center;font-size: 0.6em;width: 850px;height: 85px;font-family: 'Nunito', sans-serif;color: #343c47">
        <img src="Signature.png" alt="" style="width: 100px;height: 100px;position: absolute;top: -35px;z-index:-1;left: 160px">
        <img src="Signature.png" alt="" style="width: 100px;height: 100px;position: absolute;top: -35px;z-index:-1;left: 410px">
        <img src="Signature.png" alt="" style="width: 100px;height: 100px;position: absolute;top: -35px;z-index:-1;left: 720px">
        <table style="width: 100%;padding: 10px;margin-left: 90px">
            <tr>
                <td style="text-align: center">Ing. Edmar Perez Villarroel<br><b>INSTRUCTOR</b><br></td>
                <td style="text-align: center">MSc. Ing. G. Fernando Ureña Merida<br><b>INSTRUCTOR</b><br></td>
                <td style="text-align: center">MSc. Ing. Franz Chinche Imaña<br><b>DIRECTOR DE CARRERA</b><br><b>ING. DE SISTEMAS E ING. INFORMATICA</b></td>
            </tr>
        </table>
    </div>
    <img src="data:image/png;base64, {!! $certificado['qr'] !!}" style="border:2px solid white;position: absolute;top: 630px;right: 450px;width: 90px;height: 90px">
    <div style="border: 0px solid red;position: absolute;top: 725px;left: 120px;text-align: center;font-size: 0.5em; font-weight: bold;width: 850px;height: 35px;font-family: 'Nunito', sans-serif;color: #343c47">{{$certificado['url']}}</div>
    @if( $loop->index !== sizeof($certificados)-1)
        <div class="page_break"></div>
    @endif
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
