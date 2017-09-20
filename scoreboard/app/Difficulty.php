<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    public function scores() {
        return $this->belongstoMany('App\Score');
    }
    
}
