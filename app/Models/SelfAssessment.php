<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfAssessment extends Model
{
    use HasFactory;
    protected $fillable = [
        'faculty_id',
        'career_id',
        'plan',
        'modality_id',
        'place_id',
        'type',
        'description',
        'start_date',
        'end_date',
        'year',
        'period',
        'status',
    ];

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
    public function place(){
        return $this->belongsTo(Place::class);
    }
    public function career(){
        return $this->belongsTo(Career::class);
    }
    public function modality(){
        return $this->belongsTo(Modality::class);
    }
    public function comissions(){
        return $this->hasMany(Comission::class);
    }

}
