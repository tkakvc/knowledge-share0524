<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request_plan extends Model
{
    protected $table = 'request_plans';
    protected $fillable = ['request_user_id','plan_id','plan_stauts'];
    public function users (){
        return $this->hasMany(User::class);
    }
    public function knowledges(){
        return $this->hasMany(Knowledge::class);
    }
}
