@extends('layouts.app')

@section('content')
    
    <h1>マイページ</h1>
    <h2>{!! link_to_route('myplan','マイプラン')  !!}</h2>
    <h2>{!! link_to_route('requestplan','リクエストしたプラン') !!}</h2>
    
@endsection

