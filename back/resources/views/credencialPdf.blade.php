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
        @page { size: 5cm 8cm; }
    </style>
</head>
<body>
@foreach($credencials as $credencial)
@if($credencial['fondo']=='SI')
<img src="credencial.png" style="  position: absolute;top: 0px;left: 0px;width: 5cm;height: 8cm" >

@endif
<img src="imagenes/{{$credencial['foto']}}" style="position: absolute;top: 110px;left: 50px;width: 80px;height: 80px;border-radius: 40px" >
<div style="text-align: center;position: absolute;top: 200px;left: 0px;font-size: 8px; font-weight: bold;width: 200px;height: 15px;font-family: 'Nunito', sans-serif;color: #373e48;background-color: white">{{$credencial['nombres']}}</div>
<div style="text-align: center;position: absolute;top: 220px;left: 0px;font-size: 12px; font-weight: bold;width: 200px;height: 15px;font-family: 'Nunito', sans-serif;color: #373e48;background-color: white">{{$credencial['tipo']}}</div>
<div style="text-align: center;position: absolute;top: 242px;left: 0px;font-size: 8px; font-weight: bold;width: 200px;height: 15px;font-family: 'Nunito', sans-serif;color: #373e48;background-color: white">{{$credencial['carrera']}}</div>
{{--<div style="text-align: center;position: absolute;top: 320px;left: 58px;font-size: 15px; font-weight: bold;width: 200px;height: 40px;font-family: 'Nunito', sans-serif;color: red;text-align: center">{{$credencial['ci']}}</div>--}}
<img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="background : white ; border:2px solid white;position: absolute;top: 260px;left: 8px;width: 170px;height: 35px">
{{--<div style="color: #a0aec0;position: absolute;top: 350px;left: 915px;width: 10px;height: 10px">{{$credencial['id']}}</div>--}}
<div class="page_break"></div>
@endforeach
</body>
</html>
