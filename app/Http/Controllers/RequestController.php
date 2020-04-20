<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function store(Request $request, $id)
    {
       
        $request_management = new Request;
        $request_management->request_user_id = \Auth::user();
        $request_management->knowledge_id = $id;
        $request_management->plan_status = "approval_pending";
        $request_management->save();
        
        return redirect('/');
        
        
    }

    
}
