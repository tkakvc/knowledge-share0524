@extends('layouts.app')

@section('content')
    <style>
        h2{
            color:silver;
            font-weight:normal;
            text-align:center;
        }
        h3{
            color:gray;
            font-weight:bold;
            text-align:center;
            font-size:24px;
            margin-bottom: 60px;
        }
        h3 a{
            border-bottom:solid 2px;
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
        .edit{
            text-align: center;
            padding-bottom:30px;
        }
        .delete{
            text-align: center;
        }
        .request_message{
          padding:10px 150px 10px;
          margin-top:100px;
          margin-bottom:10px;  
          text-align: center;
      }
      .detail-box{
          padding:10px;
          border:solid 2px gray;
          border-radius:4px;
          box-shadow: 3px 3px 2px gray;
      }
      
    </style>
        
       <div class="center">
           <div class="detail-box">
           <h2>プランの内容</h2>
                
                <h3><a>{{ $knowledge->title }}</a></h3>
                    
                <h4>{{ $knowledge->content }}</h4>
                 
                 {{-- ログインユーザー＝プラン作成者　のとき --}}
                 @if($knowledge->user_id == $user->id)
                     <p>自分のプランです</p>
                 
                 {{-- リクエストされていないプランである場合 --}}
                 @elseif ($knowledge->user_id != $user->id && is_null($request_plan))
                     {!! Form::open(['route' => ['request_plan.store']]) !!}
                         {{Form::hidden('knowledge_id', $knowledge->knowledge_id)}}
                         <div class="form-group">
                            <div class="request_message">{!! Form::label('request_message','メッセージを入力し申込む' )!!}</div>
                            <a>{!! Form::textarea('request_message',null,['class' => 'form-control']) !!}</a>
                        </div>
                         <div class="mousikomi"><button type="submit" class="btn btn-secondary" >申込む</button></div>
                         
                     {!!Form::close() !!}
                 
                 {{-- リクエストしたプランのうち、承認待ちである場合 --}}
                 @elseif($request_plan->request_user_id == $user->id && $request_plan->plan_status == "pending" )
                     <p>申込み済です</p>
                 
                 {{-- リクエストしたプランのうち、承認済みである場合 --}}
                 @elseif( $request_plan->request_user_id == $user->id && $request_plan->plan_status == "approved")
                     <p>申込み済です</p>
                 
                 @else
                     {!! Form::open(['route' => ['request_plan.store']]) !!}
                         {{Form::hidden('knowledge_id', $knowledge->knowledge_id)}}
                         <div class="form-group">
                            <div class="request_message">{!! Form::label('request_message','メッセージを入力し申込む' )!!}</div>
                            <a>{!! Form::textarea('request_message',null,['class' => 'form-control']) !!}</a>
                        </div>
                         <div class="mousikomi"><button type="submit" class="btn btn-secondary" >申込む</button></div>
                     {!!Form::close() !!}
                 @endif
                
                {{-- ログインユーザーがプラン作成者である場合 --}}
                @if($user->id == $knowledge->user_id)
                    <div class="edit">{!! link_to_route('knowledges.edit','このプランを編集', ['knowledge_id' => $knowledge->knowledge_id], ['class' => 'btn btn-secondary']) !!}</div>
                    {!! Form::model($knowledge, ['route' => ['knowledges.destroy', $knowledge->knowledge_id], 'method' => 'delete']) !!}
                    {{--<div class="delete">{!! Form::submit('削除する', ['class' => 'btn btn-danger']) !!}</div>--}}
                    {!! Form::close() !!}
                @endif
            </div>  
        </div>
        
@endsection

        