<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'source_id',
        'self_assessment_id'
    ];
    public function source(){
        return $this->belongsTo(Source::class);
    }
    public function selfAssessment(){
        return $this->belongsTo(SelfAssessment::class);
    }
}
