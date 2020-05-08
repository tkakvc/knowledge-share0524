<h3>申し込んだプラン</h3>
<?php 
//  echo "リクエスト管理テーブルのknowledge_id=  ".$request_plans->knowledge_id; 
?>
@foreach ($request_plans as $request_plan)
                   
    <div class="plan"> 
    
    <h3>{!! link_to_route('knowledges.show', $request_plan->title, ['id' => $request_plan->knowledge_id]) !!}</h3>
    @if($request_plan->plan_status == "approved")
    <p>承認されました！</p>
    {!! link_to_route('chat.request', "メッセージ画面へ進む", ['id' => $request_plan->id]) !!}
    @else
    <p>承認待ちです</p>
    @endif
    <p>分類 </p> 
    <h4>{{ $request_plan->content }}</h4>
    
    <p>{{  $request_plan->user_id  }}</p>
    
    </div>
    @endforeach
    
    