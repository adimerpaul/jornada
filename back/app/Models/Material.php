<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use \OwenIt\Auditing\Auditable as Auditing;
class Material extends Model implements Auditable
{
    use HasFactory, Auditing;
    protected $fillable=[
        'nombre',
        'fecha',
        'hora',
        'estado',
        'cupo_id',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
