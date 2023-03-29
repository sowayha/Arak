<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function userbank(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
