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
        @page { size: 8cm 10cm; }
    </style>
</head>
<body>
@foreach($credencials as $credencial)
@if($credencial['fondo']=='SI')
<img src="CREDENCIAL_JTDC2022.png" style="  position: absolute;top: 0px;left: 0px;width: 8cm;height: 10cm" >

@endif
<img src="imagenes/{{$credencial['foto']}}" style="position: absolute;top: 105px;left: 115px;width: 80px;height: 80px;border-radius: 40px" >
<div style="text-align: center;position: absolute;top: 213px;left: 58px;font-size: 12px; font-weight: bold;width: 200px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48;text-align: center">{{$credencial['nombres']}}</div>
<div style="text-align: center;position: absolute;top: 255px;left: 58px;font-size: 12px; font-weight: bold;width: 200px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48;text-align: center">{{$credencial['tipo']}}</div>
<div style="text-align: center;position: absolute;top: 290px;left: 58px;font-size: 12px; font-weight: bold;width: 200px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48;text-align: center">{{$credencial['carrera']}}</div>
{{--<div style="text-align: center;position: absolute;top: 320px;left: 58px;font-size: 15px; font-weight: bold;width: 200px;height: 40px;font-family: 'Nunito', sans-serif;color: red;text-align: center">{{$credencial['ci']}}</div>--}}
<img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="background : white ; border:2px solid white;position: absolute;top: 315px;left: 68px;width: 170px;height: 35px">
{{--<div style="color: #a0aec0;position: absolute;top: 350px;left: 915px;width: 10px;height: 10px">{{$credencial['id']}}</div>--}}
<div class="page_break"></div>
@endforeach
</body>
</html>
