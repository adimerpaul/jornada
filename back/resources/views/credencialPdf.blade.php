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
<img src="credencial.jpg" style="  position: absolute;top: 0px;left: 0px;width: 8cm;height: 10cm" >
<img src="imagenes/{{$credencial['foto']}}" style="  position: absolute;top: 60px;left: 120px;width: 66px;height: 66px;border-radius: 33px" >
<div style="text-align: center;position: absolute;top: 230px;left: 10px;font-size: 14px; font-weight: bold;width: 220px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48">{{$credencial['nombres']}}</div>
<img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="border:2px solid white;position: absolute;top: 150px;left: 60px;width: 170px;height: 60px">
{{--<div style="color: #a0aec0;position: absolute;top: 350px;left: 915px;width: 10px;height: 10px">{{$credencial['id']}}</div>--}}
<div class="page_break"></div>
@endforeach
</body>
</html>
