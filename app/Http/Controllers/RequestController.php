<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Knowledge; 
use App\User;
use App\Request_plan;

class RequestController extends Controller
{
    public function store(Request $request, $id)
    {
        $request_management = [
        'request_user_id' => "aaa",
        'knowledge_id' => $id,
        'plan_status' => "approval_pending",
        ];
        DB::table('requests')->insert($request_management);
        return redirect('/index');
        
        
    }

    
}
