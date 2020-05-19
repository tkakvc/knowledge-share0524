@extends('layouts.app')

@section('content')
    <style>
        .row{
            padding:10px;
            border:solid 2px lightgray;
            background:lightgray;
            box-shadow: 3px 6px 2px gray;
        }
        .plan{
        box-shadow: 1px 2px 2px rgba(0, 0, 0, 0.5);
          margin: 10px 0;
          padding: 10px 5px;
          border: 1px solid #ccc;
          background-color: #ffffff;
        }
        h2 {
            color:rgba(73, 65, 98, 0.8);
            font-weight:normal;
            text-align:center;
             font-size:40px;
        }
        h3 {
            text-align:center;
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
        .form-detail{
            box-sizing: border-box;
            display: block;
            margin-top: 0em;
            background:#f1f1f1;
            border-radius:4px;
            border-color:#e0e0e0;
            text-align:center;
            font-size:16px;
            padding:8px 0;
        }
        .form-detail:hover{
            background-color: lightgray;
        }
        .form-detail a:hover{
            text-decoration:none;
        }
        .detail{
            
        }
        .form-detail a{
            color:#333333;
            display: block;
        }
        h4{
           color:gray;
            font-weight:normal;
            text-align:left;
            font-size:18px;
            
        }
        button.btn{
           padding:5px 160px;
        }
        .mousikomi{
             text-align: center;
        }
       
    </style>
    <div class="row">    
        <div class="center">
            <h2>プラン一覧</h2>
            @if (count($knowledges) > 0)
                @foreach ($knowledges as $knowledge)
                    <div class="plan"> 
                        <h3><a>{!! link_to_route('knowledges.show', $knowledge->title, ['knowledge_id' => $knowledge->knowledge_id]) !!}</a></h3>
                        
                        <h4>{{ $knowledge->content }}</h4>
                        <p>{{  $knowledge->user->name."さんのプランです"  }}</p>
                        <div class="form-detail">{!! link_to_route('knowledges.show', '詳細をみる', ['knowledge_id' => $knowledge->knowledge_id] ) !!}</div>
                    </div>
                @endforeach
            @endif
        </div>
        
    </div>
    
@endsection
        