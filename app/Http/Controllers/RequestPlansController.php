<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Knowledge; 
use App\User;
use App\Request_plan;
use App\Chat;
use Illuminate\Support\Facades\DB;
class RequestPlansController extends Controller
{
    public function store(Request $request)
    {
        $user = \Auth::user();
        $knowledge = Knowledge::where('knowledge_id',$request->knowledge_id)->first();
        $request_management = [
        'request_user_id' => $user->id,
        'knowledge_id' => $knowledge->knowledge_id,
        'plan_status' => "pending",
        ];
        DB::table('request_plans')->insert($request_management);
        return redirect('/');
    }
    public function receive(Request $request)
    {
        $user = \Auth::user();
        $request_plans = Request_plan::find($request->status_id);
        $request_plans->plan_status = "approved";
        $request_plans->save();
        dump($request);
        
         return redirect('/'); 
    }
}
