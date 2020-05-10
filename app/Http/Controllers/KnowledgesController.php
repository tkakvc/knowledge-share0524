<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Knowledge; 
use App\User;
use App\Request_plan;
use App\Chat;

class KnowledgesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $knowledges = Knowledge::paginate(25);
        
        return view('knowledges.index', [
            'knowledges' => $knowledges,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $knowledge = new Knowledge;
        
        return view('knowledges.create',[
            'knowledge' => $knowledge]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
         $this->validate($request, [
            'content' => 'required',
        ]);
        $user = \Auth::user();
        $knowledge = new Knowledge;
        $knowledge->user_id = $user->id;
        $knowledge->user_name = $user->name;
        $knowledge->title = $request->title;
        $knowledge->content = $request->content;
        $knowledge->save();

        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($knowledge_id)
    {
        $user = \Auth::user();
        $knowledge = Knowledge::where('knowledge_id',$knowledge_id)->first();
        $request_plan = Request_plan::where('knowledge_id',$knowledge_id)->first();
        return view('knowledges.show', [
            'knowledge' => $knowledge,
            'request_plan' => $request_plan,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($knowledge_id)
    {
        //$knowledge = Knowledge::find($knowledge_id);
        $knowledge = Knowledge::where('knowledge_id',$knowledge_id)->first();
        return view('knowledges.edit',[
            'knowledge' => $knowledge,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $knowledge_id)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);
        
        //$knowledge = Knowledge::find($knowledge_id);
        $knowledge = Knowledge::where('knowledge_id',$knowledge_id)->first();
        $knowledge->content = $request->content;
        $knowledge->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $knowledge = Knowledge::find($id);
        $knowledge->delete();

        return redirect('/');
    }
    public function myplan(){   
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $knowledges = Knowledge::where('user_id',$user->id)->get();
            $request_plans = Request_plan::where('user_id',$user->id)
            ->join('knowledges','knowledges.knowledge_id','=','request_plans.knowledge_id')->join('users','users.id','=','request_plans.request_user_id')
            ->get();
           
            $data = [
                'user' => $user,
                'knowledges' => $knowledges,
                'request_plans' => $request_plans,
                
            ];
        }
        
        return view('knowledges.myplan', $data);
    }
     public function requestplan(){
       $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $request_plans = Request_plan::where('request_user_id',$user->id)
            ->join('knowledges','knowledges.knowledge_id','=','request_plans.knowledge_id')
            ->get();
           
           
            $knowledges = Knowledge::get();
            
            $data = [
                'user' => $user,
                'knowledges' => $knowledges,
                'request_plans' => $request_plans,
              
            ];
        }
        return view('knowledges.requestplan', $data);
     }
     public function mypage(){
         
        
         return view('knowledges.mypage');
     }
     
}

