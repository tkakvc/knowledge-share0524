
@foreach ($request_plans as $request_plan)
                   
    <div class="plan"> 
    <h3>{!! link_to_route('knowledges.show', $request_plan->title, ['id' => $request_plan->id]) !!}</h3>
   
    <p>申し込みが来ています！</p>
    {!! Form::open(['route' => ['request_plan.receive']]) !!}
                         {{Form::hidden('status_id', $request_plan->status_id)}}
            {!! Form::submit('承認する', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
   
    @if($request_plan->plan_status == 'approved')
    {!! link_to_route('chat.myplan', "メッセージ画面へ進む") !!}
    @endif
    <p>分類 </p>
    <h4>{{ $request_plan->content }}</h4>
    <p>{{  $request_plan->user_id  }}</p>
    </div>
    @endforeach
    
   