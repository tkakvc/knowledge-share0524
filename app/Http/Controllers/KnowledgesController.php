<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Knowledge; 
use App\User;

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
        
        $knowledge = new Knowledge;
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
    public function mypage()
    {
        
        $knowledges = Knowledge::paginate(25);
        
        return view('knowledges.mypage', [
            'knowledges' => $knowledges,
        ]);
    }
}

