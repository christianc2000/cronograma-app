<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comission extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'start_date',
        'end_date',
        'self_assessment_id',
        'c_member_id'
    ];
    public function selfAssessment(){
        return $this->belongsTo(SelfAssessment::class);
    }
    public function cmember(){
        return $this->belongsTo(CMember::class,'c_member_id','id');
    }
}
