<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre'
    ];

    public function selfAssessments(){
        return $this->hasMany(SelfAssessment::class);
    }
}
