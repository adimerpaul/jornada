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
        @page { size: 5cm 8cm; } /*5 8*/
    </style>
</head>
<body>
@foreach($credencials as $credencial)
@if($credencial['fondo']=='SI')
<img src="credencial.png" style="  position: absolute;top: 0px;left: 0px;width: 5cm;height: 8cm" >

@endif
<img src="imagenes/{{$credencial['foto']}}" style="position: absolute;top: 110px;left: 60px;width: 70px;height: 70px;border-radius: 50px" >
<div style="position: absolute;top: 198px;left: 25px;font-size: 8px; font-weight: bold;width: 140px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48;text-align: center">{{$credencial['nombres']}}</div>
<div style="position: absolute;top: 220px;left: 0px;font-size: 12px; font-weight: bold;width: 190px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48;text-align: center">{{$credencial['tipo']}}</div>
<div style="position: absolute;top: 245px;left: 0px;font-size: 10px; font-weight: bold;width: 190px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48;text-align: center">{{$credencial['carrera']}}</div>
{{--<div style="text-align: center;position: absolute;top: 320px;left: 58px;font-size: 15px; font-weight: bold;width: 200px;height: 40px;font-family: 'Nunito', sans-serif;color: red;text-align: center">{{$credencial['ci']}}</div>--}}
<img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="background : white ;   border-top: 5px solid white;
  border-bottom: 5px solid white;
  border-left: 10px solid white;   /* borde más ancho a la izquierda */
  border-right: 10px solid white; position: absolute;top: 260px;left: 10px;width: 150px;height: 20px">
{{--<div style="color: #a0aec0;position: absolute;top: 350px;left: 915px;width: 10px;height: 10px">{{$credencial['id']}}</div>--}}
<div class="page_break"></div>
@endforeach
</body>
</html>
