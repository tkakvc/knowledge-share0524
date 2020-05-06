<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\Request_plan;
use App\Knowledge;
use App\User;

class ChatsController extends Controller
{
    public function request(){
        $user = \Auth::user();
        
        $request_plans = Request_plan::where('request_user_id',$user->id)
            ->join('knowledges','knowledges.id','=','request_plans.knowledge_id')
            ->first();
        
        
        $chats = Chat::get();
        $data = [
            'user' => $user,
            'request_plans' => $request_plans,
            'chats' => $chats,
            ];
        return view('chats.request',$data);
        
    }
    
    public function myplan(){
        $user = \Auth::user();
        
        $request_plans = Request_plan::where('user_id',$user->id)
            ->join('knowledges','knowledges.id','=','request_plans.knowledge_id')
            ->first();
        
        
        $chats = Chat::get();
        $data = [
            'user' => $user,
            'request_plans' => $request_plans,
            'chats' => $chats,
            ];
        return view('chats.request',$data);
        
    }
    
    public function submit(Request $request){
        $this->validate($request, [
            'message' => 'required',
        ]);
        $user = \Auth::user();
        $request_plans = Request_plan::where('request_user_id',$user->id)
            ->join('knowledges','knowledges.id','=','request_plans.knowledge_id')
            ->first();
        $chat = new Chat;
        $chat->submit_user_id = $user->id;
        $chat->receive_user_id = $request_plans->user_id;
        $chat->message = $request->message;
        $chat->read_flag = "unread";
        $chat->save();
         
        return redirect('chat.request');
    }
    public function receive(Request $request){
        $this->validate($request, [
            'message' => 'required',
        ]);
        $user = \Auth::user();
        $request_plans = Request_plan::where('user_id','=',$user->id)
            ->join('knowledges','knowledges.id','=','request_plans.knowledge_id')
            ->first();
        $chat = new Chat;
        $chat->receive_user_id = $request_plans->request_user_id;
        $chat->message = $request->message;
        $chat->read_flag = "unread";
        
        $chat->submit_user_id = $user->id;
        $chat->save();
         
        return redirect('chat.myplan');
}
}
