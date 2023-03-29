<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ser(){
        return $this->belongsTo(ReqServices::class,'service_id','id');
    }
    public function status(){
        return $this->belongsTo(ReqStatus::class,'status_id','id');
    }

    public function reqUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
