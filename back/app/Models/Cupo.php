<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use \OwenIt\Auditing\Auditable as Auditing;

class Cupo extends Model implements Auditable
{
    use HasFactory, Auditing;
    protected $fillable=[
        'ci',
        'nombres',
        'apellidos',
        'carrera',
        'foto',
        'celular',
        'direccion',
        'correo',
        'codigo',
        'credencial',
        'folder',
        'barbijo',
        'certificado',
        'tipo',
        'cd',
        'paquete_id',

    ];

    public function materials()
    {
        return $this->hasMany(Material::class)->with('user');
    }
}
