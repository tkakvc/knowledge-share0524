@extends('layouts.app')

@section('content')
    <style>
      .box{
            margin: 1em 0;
            padding:10px;
            background: white;
            border:solid 8px rgba(14, 13, 16, 0.65);
            box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.33);
      }
      .plan{
          box-shadow: 1px 2px 2px rgba(0, 0, 0, 0.5);
          margin: 10px 0;
          padding: 10px 5px;
          border: 1px solid #ccc;
          background-color: #ffffff;
      }
      .plan p{
          text-align: center;
          font-size:14px;
      }
     ul{
        margin:0;
        padding:0;
        list-style:none;
        
      }
      li a{
        display:block;
        color:black;
        font-size:14px;
        text-decoration:none;
        padding: 16px ;
        
      }
      
      ul:after{
        content:"";
        display:block;
        clear:both;
      }
      li{
        float:left;
        width:50%;
        
      }
      li:hover{
          text-decoration:none;
      }
      li a{
          text-align: center;
      }
      .tab2 {
          background:rgba(14, 13, 16, 0.65);
          
      }
      .tab2 a{
          color: gray;
          text-decoration:underline;
          font-size:15px;
      }
      .tab2 a:hover{
          color:white;
          text-decoration:none;
          font-size:16px;
          text-decoration:underline;
      }
      li.active div{
          background:rgba(14, 13, 16, 0.65);
          
          background: white;
      }
      li.active div a{
          color: rgba(14, 13, 16, 0.65);
          font-size:24px;
          font-weight:bold;
          text-decoration: underline;
          text-decoration-color:rgba(14, 13, 16, 0.65);
          
      }
      li.active div a:hover{
          font-size:24px;
          text-decoration:underline;
          color:gray;
      }
      .tab1{
            background:rgba(14, 13, 16, 0.65);
            
            border-bottom:solid rgba(14, 13, 16, 0.65);
            border-bottom: transparent;
            
            
      }
      .tab1 a{
          color:rgba(14, 13, 16, 0.65);
          font-size:14px;
          font-weight:normal;
          color:gray;
          text-decoration: underline;
          text-decoration-color:gray;          
      }
      .tab1 a{
          font-size:15px;
          color:gray;
      }
      .tab1 a:hover{
          color:white;
          text-decoration:none;
          font-size:16px;
          text-decoration:underline;
      }
      
      
      .message a{
          text-decoration: none;
          color:rgba(14, 13, 16, 0.65);  
      }
      .request {
          text-decoration: none;
          color:rgba(14, 13, 16, 0.65);
      }
      h3 {
            text-align:center;
            margin-bottom: 0;
            
        }
      h3 a{
            color:rgba(14, 13, 16, 0.65);
            font-weight:bold;
            text-align:center;
            font-size:24px;
                        
      }
      h3 a:hover{
            text-decoration: none;
            color:black;
        }
      button.btn{
         padding:5px 80px;
         
      }
      .approve{
        text-align:center;
        margin-bottom:20px;
      }
      .request{
        text-align:center;
        font-weight:bold;
        color:black;
        padding-bottom:5px;
        font-size:20px;
      }
      .message{
        text-align:center;
        text-decoration:underline;
        font-size:18px;
        margin-bottom: 30px;
      }
      .pending{
          text-align: center;
      }
      .approved{
         text-align: center;
      }
      .message-box{
          border:solid 2px lightgray;
          border-radius:2px;
          padding:10px 30px;
          margin:20px 130px;
          
      }
      .request-message{
          padding:0 6px;
          margin:3px 0;
          background:#ecf7ea;
          background:#f1f1f1;
         
          
      }
      .message-content{
          padding:0 6px;
          margin:6px 0 ;
          background:#ecf7ea;
          background:#f1f1f1;
          
      }
      .name{
         margin-left:39%;
         border-left: inset 6px gray;
      }
      .name p{
          margin-left: 30px;
          text-align:left;
      }
      
      
    </style>
    
    
    <h1>マイページ</h1>
    <div class="box">
        <ul class="tab">
          <li class="active"><div class="tab1"><a href="#tab1" >　　マイプラン　　</a></div></li>
          <li><div class="tab2"><a href="#tab2">　リクエストしたプラン　</a></div></li>
        </ul>
        
        
        {{-- 自分のプランの一覧を表示する --}}
        
        <div class="tabContents active" id="tab1">
         
            @foreach ($knowledges as $knowledge)
            
            <div class="plan"> 
            
            <h3><a>{!! link_to_route('knowledges.show', $knowledge->title, ['id' => $knowledge->knowledge_id]) !!}</a></h3>
            　
              @foreach  ($myplans_requested as $myplan_requested)
                
                {{--  リクエストを受けまだ承認していないプランに『承認する』ボタンを表示 --}}
                @if($myplan_requested->plan_status == "pending" && $myplan_requested->knowledge_id == $knowledge->knowledge_id)
                    <div class="request"><a>{{  $myplan_requested->name."さんから申し込みが来ています！"}}</a></div>
                    {!! Form::open(['route' => ['request_plan.receive']]) !!}
                        {{Form::hidden('status_id', $myplan_requested->status_id)}}
                            <div class="message-box">    
                                <div class="request-message">リクエストメッセージ</div>
                                <div class="message-content">{{ $myplan_requested->request_message }}</div>
                            </div>
                            <div class="approve"><button type="submit" class="btn btn-secondary" >承認する</button></div>
                            
                    {!! Form::close() !!}
                @endif
                {{--  リクエストされて既に承認したプランに『メッセージ画面へ進む』表示 --}}
                @if($myplan_requested->plan_status == 'approved' && $myplan_requested->knowledge_id == $knowledge->knowledge_id)
                    <div class="name"><p>{{$myplan_requested->name."さんからのリクエスト"}}</p></div>
                    <div class="message"><a>{!! link_to_route('chat.index', "➡メッセージ画面へ進む",['id' => $myplan_requested->status_id]) !!}</a></div>
                @endif
                
                @if($myplan_requested->plan_status != "pending" && $myplan_requested->plan_status != "approved" && $myplan_requested->knowledge_id == $knowledge->knowledge_id)
                <p>まだリクエストは来ていません</p>
                @endif
              
              @endforeach
            </div>
            @endforeach
         </div>
        
        
        {{-- リクエストしたプランの一覧を表示 --}}
        
        <div class="tabContents" id="tab2">
            @foreach ($request_plans as $request_plan)
                               
                <div class="plan"> 
                
                <h3>{!! link_to_route('knowledges.show', $request_plan->title, ['id' => $request_plan->knowledge_id]) !!}</h3>
                    @if($request_plan->plan_status == "approved")
                        <div class="approved">承認済みです</div>
                        <div class="message"><a>{!! link_to_route('chat.index', "➡メッセージ画面へ進む", ['id' => $request_plan->status_id]) !!}</a></div>
                    @else
                        <div class="pending">承認待ちです</div>
                    @endif
                
                </div>
                
            @endforeach
        </div>
    </div>
    
@endsection

