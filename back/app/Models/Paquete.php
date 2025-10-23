<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use \OwenIt\Auditing\Auditable as Auditing;
class Paquete extends Model implements Auditable
{
    use HasFactory, Auditing;


    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function conferencias()
    {
        return $this->belongsToMany(Conferencia::class);
    }
}
