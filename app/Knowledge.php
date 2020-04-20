<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    protected $table = 'knowledges'; 
    protected $fillable = ['title', 'content','user_id'];
    public function users(){
        return $this->belongTo(User::class);
    }
    public function requests(){
        return $tihs->belongTo(Request::class);
    }
}
