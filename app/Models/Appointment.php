<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public function service(){
        return $this->belongsTo(Service::class);
    }
    
    public function plumber(){
        return $this->belongsTo(Plumber::class);
    }

    public function invoice(){
        return $this->hasOne(Invoice::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }




}
