<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function quoteUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function quoteReq(){
        return $this->belongsTo(Requests::class,'req_id','id');
    }

}

