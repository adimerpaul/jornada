<?php

namespace App\Http\Controllers;

use App\Models\Cupo;
use App\Http\Requests\StoreCupoRequest;
use App\Http\Requests\UpdateCupoRequest;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Intervention\Image\ImageManagerStatic as Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CupoController extends Controller
{
    public function index(){return Cupo::all();}
    public function store(StoreCupoRequest $request){return Cupo::create($request->all());}
    public function show($codigo){
        return Cupo::where('codigo', $codigo)->first();
    }
    public function update(UpdateCupoRequest $request, Cupo $cupo){
        $cupo->update($request->all());
        return $cupo;
    }
    public function destroy(Cupo $cupo){$cupo->delete();return $cupo;}
    public function cupoPdf(Request $request){
        $data=[];
        foreach ($request->all() as $value) {
            $png = QrCode::format('png')->size(250)->generate(env('URL_FRONT').'registro/'.$value['codigo']);
            $png = base64_encode($png);
            $value['qr']=$png;
            $data[]=$value;
        }
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('cupoPdf', ['cupos' => $data]);
        $pdf->setPaper('letter', 'landscape');
        $pdf->save('cupos.pdf')->stream();
    }
    public function cupoFile(){
        return response()->file('cupos.pdf');
    }
    public function rotateFoto(Request $request){
        $this->validate($request, [
            'foto'=>'required',
        ]);
        $image = $request->file('foto');
        return $request;
        $file    = $request->file('file');
//        $nombre     = time().".".$file->getClientOriginalExtension();
        $file_name = time().'_.'.$image->getClientOriginalExtension();
        $file_out = time().'.'.$image->getClientOriginalExtension();

        $parts = pathinfo($file_name);

        $extensions = $parts['extension'];

        if($extensions == "jpeg"){

            $degrees = 90;

            $source = imagecreatefromjpeg($image);

            $rotate = imagerotate($source, $degrees, 0);

            imagejpeg($rotate, $file_out);
            $cupo = Cupo::find($request->id);
            $cupo->foto = $file_out;
            $cupo->save();
            return response()->file(public_path($file_out));


        }elseif($extensions == "png"){

            $degrees = 90;

            $source = imagecreatefrompng($image);

            $rotate = imagerotate($source, $degrees, 0);

            imagepng($rotate, $file_out);
            $cupo = Cupo::find($request->id);
            $cupo->foto = $file_out;
            $cupo->save();
            return response()->file(public_path($file_out));

        }else{
            echo "Plz Select jpeg And Png File.";
        }
    }
}
