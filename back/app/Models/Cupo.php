<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Cupo extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
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
