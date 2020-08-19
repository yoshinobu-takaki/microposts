<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content','user_id'];
    
    //一対多の関係を記述
    public function user(){
      return $this->belongsTo(User::class);
    }
}
