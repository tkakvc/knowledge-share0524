@extends('layouts.app')

@section('content')
    
    <div class="row">    
        
        <div class="left">a</div>
        
        <div class="center">
            
            <h2>プラン詳細ページ</h2>
                
                <h3>{{ $knowledge->title }}</h3>
                    <p>分類</p>
                <h4>{{ $knowledge->content }}</h4>
                 
                 @if($knowledge->user_id == $user->id)
                     <p>自分のプランです</p>
                
                 @elseif (is_null($request_plan) || $knowledge->user_id != $user->id)
                     {!! Form::open(['route' => ['request_plan.store']]) !!}
                         {{Form::hidden('knowledge_id', $knowledge->knowledge_id)}}
                         {!! Form::submit('申し込む', ['class' => "btn btn-primary btn-block"]) !!}
                     {!!Form::close() !!}
                 
                 @elseif($request_plan->request_user_id == $user->id && $request_plan->plan_status == "pending" || $request_plan->request_user_id == $user->id && $request_plan->plan_status == "approved")
                     <p>申し込み済みです</p>
                 @endif
                
                @if($user->id == $knowledge->user_id)
                    {!! link_to_route('knowledges.edit','このプランを編集', ['knowledge_id' => $knowledge->knowledge_id], ['class' => 'btn btn-light']) !!}
                        {!! Form::model($knowledge, ['route' => ['knowledges.destroy', $knowledge->knowledge_id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
        </div>
           
        <div class="right">b</div>
    </div>
@endsection

        