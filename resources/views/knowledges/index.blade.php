@extends('layouts.app')

@section('content')
    
    <div class="row">    
        
        <div class="left">a</div>
        
        <div class="center">
            <h2>プラン一覧</h2>
            @if (count($knowledges) > 0)
                @foreach ($knowledges as $knowledge)
                    <div class="plan"> 
                        <h3>{!! link_to_route('knowledges.show', $knowledge->title, ['knowledge_id' => $knowledge->knowledge_id]) !!}</h3>
                        <p>分類</p>
                        <h4>{{ $knowledge->content }}</h4>
                        <p>{{  $knowledge->user_id  }}</p>
                    </div>
                @endforeach
            @endif
            {{ $knowledges->links('pagination::bootstrap-4') }}
        </div>
        
        <div class="right">b</div>
        
    </div>
@endsection
        