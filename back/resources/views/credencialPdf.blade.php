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
    @if($loop->index%8==0)
        <img src="certificado.jpg" style="  position: absolute;top: 5px;left: 5px;width: 259px;height: 400px" >
        <img src="imagenes/{{$credencial['foto']}}" style="  position: absolute;top: 150px;left: 100px;width: 65px;height: 65px" >
        <div style="text-align: center;position: absolute;top: 230px;left: 20px;font-size: 15px; font-weight: bold;width: 220px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48">{{$credencial['nombres']}}</div>
        <img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="border:2px solid white;position: absolute;top: 275px;left: 50px;width: 170px;height: 60px">
        <div style="color: #a0aec0;position: absolute;top: 350px;left: 135px;width: 10px;height: 10px">{{$credencial['id']}}</div>
    @elseif($loop->index%8==1)
        <img src="certificado.jpg" style="  position: absolute;top: 5px;left: 265px;width: 259px;height: 400px" >
        <img src="imagenes/{{$credencial['foto']}}" style="  position: absolute;top: 150px;left: 360px;width: 65px;height: 65px" >
        <div style="text-align: center;position: absolute;top: 230px;left: 280px;font-size: 15px; font-weight: bold;width: 220px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48">{{$credencial['nombres']}}</div>
        <img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="border:2px solid white;position: absolute;top: 275px;left: 310px;width: 170px;height: 60px">
        <div style="color: #a0aec0;position: absolute;top: 350px;left: 395px;width: 10px;height: 10px">{{$credencial['id']}}</div>
    @elseif($loop->index%8==2)
        <img src="certificado.jpg" style="  position: absolute;top: 5px;left: 525px;width: 259px;height: 400px" >
        <img src="imagenes/{{$credencial['foto']}}" style="  position: absolute;top: 150px;left: 620px;width: 65px;height: 65px" >
        <div style="text-align: center;position: absolute;top: 230px;left: 540px;font-size: 15px; font-weight: bold;width: 220px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48">{{$credencial['nombres']}}</div>
        <img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="border:2px solid white;position: absolute;top: 275px;left: 570px;width: 170px;height: 60px">
        <div style="color: #a0aec0;position: absolute;top: 350px;left: 655px;width: 10px;height: 10px">{{$credencial['id']}}</div>
    @elseif($loop->index%8==3)
        <img src="certificado.jpg" style="  position: absolute;top: 5px;left: 785px;width: 259px;height: 400px" >
        <img src="imagenes/{{$credencial['foto']}}" style="  position: absolute;top: 150px;left: 880px;width: 65px;height: 65px" >
        <div style="text-align: center;position: absolute;top: 230px;left: 800px;font-size: 15px; font-weight: bold;width: 220px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48">{{$credencial['nombres']}}</div>
        <img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="border:2px solid white;position: absolute;top: 275px;left: 830px;width: 170px;height: 60px">
        <div style="color: #a0aec0;position: absolute;top: 350px;left: 915px;width: 10px;height: 10px">{{$credencial['id']}}</div>
    @elseif($loop->index%8==4)
        <img src="certificado.jpg" style="  position: absolute;top: 405px;left: 5px;width: 259px;height: 400px" >
        <img src="imagenes/{{$credencial['foto']}}" style="  position: absolute;top: 550px;left: 100px;width: 65px;height: 65px" >
        <div style="text-align: center;position: absolute;top: 630px;left: 20px;font-size: 15px; font-weight: bold;width: 220px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48">{{$credencial['nombres']}}</div>
        <img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="border:2px solid white;position: absolute;top: 675px;left: 50px;width: 170px;height: 60px">
        <div style="color: #a0aec0;position: absolute;top: 750px;left: 135px;width: 10px;height: 10px">{{$credencial['id']}}</div>
    @elseif($loop->index%8==5)
        <img src="certificado.jpg" style="  position: absolute;top: 405px;left: 265px;width: 259px;height: 400px" >
        <img src="imagenes/{{$credencial['foto']}}" style="  position: absolute;top: 550px;left: 360px;width: 65px;height: 65px" >
        <div style="text-align: center;position: absolute;top: 630px;left: 280px;font-size: 15px; font-weight: bold;width: 220px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48">{{$credencial['nombres']}}</div>
        <img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="border:2px solid white;position: absolute;top: 675px;left: 310px;width: 170px;height: 60px">
        <div style="color: #a0aec0;position: absolute;top: 750px;left: 395px;width: 10px;height: 10px">{{$credencial['id']}}</div>
    @elseif($loop->index%8==6)
        <img src="certificado.jpg" style="  position: absolute;top: 405px;left: 525px;width: 259px;height: 400px" >
        <img src="imagenes/{{$credencial['foto']}}" style="  position: absolute;top: 550px;left: 620px;width: 65px;height: 65px" >
        <div style="text-align: center;position: absolute;top: 630px;left: 540px;font-size: 15px; font-weight: bold;width: 220px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48">{{$credencial['nombres']}}</div>
        <img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="border:2px solid white;position: absolute;top: 675px;left: 570px;width: 170px;height: 60px">
        <div style="color: #a0aec0;position: absolute;top: 750px;left: 655px;width: 10px;height: 10px">{{$credencial['id']}}</div>
    @elseif($loop->index%8==7)
        <img src="certificado.jpg" style="  position: absolute;top: 405px;left: 785px;width: 259px;height: 400px" >
        <img src="imagenes/{{$credencial['foto']}}" style="  position: absolute;top: 550px;left: 880px;width: 65px;height: 65px" >
        <div style="text-align: center;position: absolute;top: 630px;left: 800px;font-size: 15px; font-weight: bold;width: 220px;height: 40px;font-family: 'Nunito', sans-serif;color: #373e48">{{$credencial['nombres']}}</div>
        <img src="data:image/png;base64, {!! $credencial['qr'] !!}" style="border:2px solid white;position: absolute;top: 675px;left: 830px;width: 170px;height: 60px">
        <div style="color: #a0aec0;position: absolute;top: 750px;left: 915px;width: 10px;height: 10px">{{$credencial['id']}}</div>
        <div class="page_break"></div>

{{--        <div style="position: absolute;top: 753px;left: 490px; font-weight: bold;width: 85px;height: 85px;font-family: 'Nunito', sans-serif;color: #a0aec0">{{$cupo['id']}}</div>--}}
{{--    @else--}}
{{--        <img src="folleto.jpg" style="  position: absolute;top: 5px;right: 5px;width: 518px;height: 800px" >--}}
{{--        <img src="data:image/png;base64, {!! $cupo['qr'] !!}" style="border:2px solid white;position: absolute;top: 575px;right: 25px;width: 90px;height: 90px">--}}
{{--        <div style="position: absolute;top: 753px;right: -50px; font-weight: bold;width: 85px;height: 85px;font-family: 'Nunito', sans-serif;color: #a0aec0">{{$cupo['id']}}</div>--}}
{{--        <div class="page_break"></div>--}}
    @endif
@endforeach
</body>
</html>
