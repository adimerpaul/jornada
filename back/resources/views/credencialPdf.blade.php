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
@foreach($credencials as $credencial)
<img src="certificado.jpg" style="  position: absolute;top: 5px;left: 785px;width: 259px;height: 400px" >
<img src="imagenes/{{$credencial['foto']}}" style="  position: absolute;top: 150px;left: 880px;width: 65px;height: 65px" >
<div style="text-align: center;position: absolute;top: 230px;left: 800px;font-size: 15px; font-weight: bold;width: 220px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48">{{$credencial['nombres']}}</div>
<img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="border:2px solid white;position: absolute;top: 275px;left: 830px;width: 170px;height: 60px">
<div style="color: #a0aec0;position: absolute;top: 350px;left: 915px;width: 10px;height: 10px">{{$credencial['id']}}</div>
@endforeach
</body>
</html>