<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Knowledge; 
use App\User;
use App\Request_plan;
use Illuminate\Support\Facades\DB;
class Request_plansController extends Controller
{
    public function store(Request $request)
    {
        $user = \Auth::user();
        $knowledge = Knowledge::find($request->id);
        $request_management = [
        'request_user_id' => $user->id,
        'knowledge_id' => $knowledge->id,
        'plan_status' => "pending",
        ];
        DB::table('request_plans')->insert($request_management);
        return redirect('/');
    }
}
