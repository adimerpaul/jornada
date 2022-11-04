<?php

namespace App\Http\Controllers;

use App\Models\Cupo;
use App\Http\Requests\StoreCupoRequest;
use App\Http\Requests\UpdateCupoRequest;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Intervention\Image\Image;
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
        $img = Image::make('imagenes/'.$request->foto);
        $img->rotate(90);
    }
}
