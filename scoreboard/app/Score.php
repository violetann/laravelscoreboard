<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function difficulty(){
        return $this->BelongsTo('App\Difficulty');   
    }
    public function user(){
        return $this->BelongsTo('App\User');
    }    
    
    protected $fillable = [
        'user_id','difficulty_id','score'
    ];
}
