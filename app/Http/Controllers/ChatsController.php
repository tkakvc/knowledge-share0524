<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\Request_plan;
use App\Knowledge;
use App\User;

class ChatsController extends Controller
{
    public function getChatList($id){
        $user = \Auth::user();
        $request_plans = Request_plan::find($id);
        $chats = Chat::where('status_id',$id)->get();
        $data = [
            'user' => $user,
            'request_plans' => $request_plans,
            'chats' => $chats,
            ];
        return view('chats.index',$data);
        }
    public function submit(Request $request){
        $this->validate($request, [
            'message' => 'required',
        ]);
        $user = \Auth::user();
        // $knowledge = Knowledge::find(7);
        $knowledge = Knowledge::where('knowledge_id',$request->knowledge_id)->first();
        $request_plans = Request_plan::where('knowledge_id',$request->knowledge_id)->first();
        $chat = new Chat;
         
        $chat->submit_user_id = $user->id;
        $chat->message = $request->message;
        $chat->read_flag = "unread";
        $chat->status_id = $request_plans->status_id;
        if($user->id == $request_plans->request_user_id){
            $chat->receive_user_id = $knowledge->user_id;
        }else{
            $chat->receive_user_id = $request_plans->request_user_id;
        }
        $chat->save();

        return back();
    
        }
    }
   