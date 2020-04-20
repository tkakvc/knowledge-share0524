<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'request';
    protected $fillable = ['request_user_id','knowledge_id','request_stats'];
    public function users (){
        return $this->hasMany(User::class);
    }
    public function knowledges(){
        return $this->hasMany(Knowledge::class);
    }
    
}
