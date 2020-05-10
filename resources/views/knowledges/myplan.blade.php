<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <title>ナレッジシェア</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Paytone+One&display=swap');
*{
   margin:0;
   padding:0;
}
h1{
    
}
li{
   list-style:none; 
}

@media (min-width: 768px){
header:after{content: "";
            display: block;
            clear: both;}
.header-left{float: left;
            width: 50%;}
.navbar{float:left;
        width: 50%;
        display:block;
        
}
}
header{background-color:#DCDCDC;}
.header-left h1 a{
    margin:0;
    margin-left:30%;
    text-decoration: none;
    color:#111111;
    font-family: 'Paytone One', sans-serif;
    font-weight: normal;
    font-size:30px;    
}
img{
    
    max-width: 100%;
    height:auto;
}

.navbar ul{
    margin:0;
    padding: 0;
    list-style: none;
}
.navbar li a{
    margin-left:70%;
    display:block;
    text-decoration: none;
    color:#111111;
    font-size:15px; 
    padding:5px;
}
.navbar li a:hover {background-color: #eeeeee}
/*.navbar ul:after{*/
/*    content:"";*/
/*    display:block;*/
/*    clear:both;*/
/*}*/
/*.navbar li {*/
/*    float:left;*/
/*    width:auto;*/
/*}*/
main:after{content:""; display: block; clear:both;}
.right{float:left; width:20%;}
.center{float:left; width:60%;}
.left{float:left; width:20%;}

main h2{margin-top:0;
        margin-bottom:10px;
        font-size:26px;
        border-bottom: solid silver;}
main p{color:gray;
       font-size:14px;
       margin-top:0;
       margin-bottom:10px;}
main h3{margin-top:0;
        margin-bottom:10px;
        font-size: 20px;
        font-weight: bold;
}
main h4{margin-top:0;
        padding-bottom:20px;
        border-bottom: solid silver;
        font-size: 18px;
        font-weight: lighter; 
}
</style>
    </head>
    <body>    
        <header>
            <div class="header-left">
              <h1><a>{!! link_to_route('knowledges.index','ナレッジシェア') !!}</a></h1>
            </div>
            <div class="navbar">
              @if (Auth::check())
              <ul>
                  <li><a>{!! link_to_route('knowledges.index','トップページ') !!}</a></li>
                  <li><a> {!! link_to_route('knowledges.create', 'プラン作成') !!}</a></li>
                  <li><a> {{ "チャットページへ" }}</a></li>
                  <li><a> {!! link_to_route('logout.get', 'ログアウト') !!}</a></li>
              </ul> 
              @endif
              
            </div>
            <main>
                <h2>{!! link_to_route('knowledges.requestplan','マイプラン') !!}</h2>
@foreach ($request_plans as $request_plan)
    
    <div class="plan"> 
    <h3>{!! link_to_route('knowledges.show', $request_plan->title, ['id' => $request_plan->id]) !!}</h3>
    @if($request_plan->plan_status == "pending")
    <p>{{ $request_plan->name }}さんから申し込みが来ています！</p>
    {!! Form::open(['route' => ['request_plan.receive']]) !!}
        {{Form::hidden('status_id', $request_plan->status_id)}}
        {!! Form::submit('承認する', ['class' => "btn btn-primary btn-block"]) !!}
    {!! Form::close() !!}
   
    @elseif($request_plan->plan_status == 'approved')
    {!! link_to_route('chat.index', "メッセージ画面へ進む",['id' => $request_plan->status_id]) !!}
    @endif
    @endforeach
            <h2>{!! link_to_route('knowledges.requestplan','リクエストしたプラン') !!}</h2>    
            </main>
            
        </header>
        
        
        
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>

    
    <!--@foreach ($knowledges as $knowledge)-->
                   
    <!--<div class="plan"> -->
    <!--<h3>{!! link_to_route('knowledges.show', $knowledge->title, ['id' => $knowledge->id]) !!}</h3>-->
    <!--<p>分類 </p>-->
    <!--<h4>{{ $knowledge->content }}</h4>-->
    <!--<p>{{  $knowledge->user_id  }}</p>-->
    <!--</div>-->
   
    <!--@endforeach-->
    
    
    
   