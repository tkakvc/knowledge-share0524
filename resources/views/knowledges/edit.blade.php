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
              <h1><a href="#">ナレッジシェア</a></h1>
            </div>
            <div class="navbar">
              <ul>
                  <li> {!! link_to_route('knowledges.create', 'プラン作成', [], ['class' => 'btn btn-primary']) !!}</li>
                  <li><a href="#">マイページ</a></li>
                  <li><a href="#">ログイン</a></li>
                  <li><a href="#">新規登録</a></li>

              </ul>  
            </div>
            
        </header>
        
        <main>
            <div class="left">a</div>
            <div class="center">
                @if (count($errors) > 0)
                        <ul class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <li class="ml-4">{{ $error }}</li>
                            @endforeach
                           </ul>
                    @endif
            <h2>プラン編集ページ</h2>
                <div class="row">
                    <div class="col-6">
                        {!! Form::model($knowledge, ['route' => ['knowledges.update',$knowledge->id],'method' => 'put']) !!}
        
                            <div class="form-group">
                                {!! Form::label('title', 'タイトル:') !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('content','プランの内容:' )!!}
                                {!! Form::text('content',null,['class' => 'form-control']) !!}
                            </div>
        
                            {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        
                        {!! Form::close() !!}
                    </div>
                </div>
        
                    <div class="plan"> 
                        <h3>{{ $knowledge->title }}</h3>
                        <p>分類</p>
                        <h4>{{ $knowledge->content }}</h4>
                    </div>
                
            
            </div>
            <div class="right">b</div>
        </main>
        
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>