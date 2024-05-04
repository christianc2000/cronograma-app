<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'cordinator',
        'type',
        'nombre',
        'correo',
        'celular'
    ];
    public function comissions(){
        return $this->hasMany(Comission::class);
    }
}
