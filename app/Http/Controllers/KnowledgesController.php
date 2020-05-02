<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Knowledge; 
use App\User;
use App\Request_plan;

class KnowledgesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
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
    public function show($id)
    {
        $user = \Auth::user();
        $knowledge = Knowledge::find($id);

        return view('knowledges.show', [
            'knowledge' => $knowledge,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $knowledge = Knowledge::find($id);
        
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);
        
        $knowledge = Knowledge::find($id);
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
            $knowledges = Knowledge::get();
            $request_plans = Request_plan::where('plan_status','pending')
            ->join('knowledges','knowledges.id','=','request_plans.knowledge_id')->where('user_id',$user->id)
            ->get();
            // $knowledges = $user->knowledges()->where('user_id',$user->id)->orderBy('created_at', 'desc')->paginate(10);
           
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
            ->join('knowledges','knowledges.id','=','request_plans.knowledge_id')
            ->get();
            dump($request_plans);
            // dump($request_plans[0]->request_user_id);
            $knowledges = Knowledge::get();
            
            $data = [
                'user' => $user,
                'knowledges' => $knowledges,
                'request_plans' => $request_plans,
            ];
        }
        return view('knowledges.requestplan', $data);
     }
}

