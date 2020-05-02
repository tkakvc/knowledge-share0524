
@foreach ($request_plans as $request_plan)
                   
    <div class="plan"> 
    <h3>{!! link_to_route('knowledges.show', $request_plan->title, ['id' => $request_plan->id]) !!}</h3>
    <p></p>
    <p>分類 </p>
    <h4>{{ $request_plan->content }}</h4>
    <p>{{  $request_plan->user_id  }}</p>
    </div>
    @endforeach
    
   