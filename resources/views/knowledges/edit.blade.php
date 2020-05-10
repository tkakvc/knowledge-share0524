@extends('layouts.app')

@section('content')
    
    <div class="row">    
        
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
                        {!! Form::model($knowledge, ['route' => ['knowledges.update',$knowledge->knowledge_id],'method' => 'put']) !!}
                            <div class="form-group">
                                {!! Form::label('title', 'タイトル:') !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('content','プランの内容:' )!!}
                                {!! Form::text('content',null,['class' => 'form-control']) !!}
                            </div>
                            {!! Form::hidden('knowledge_id', $knowledge->knowledge_id) !!}
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
    
    </div>
@endsection