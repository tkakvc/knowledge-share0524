
@foreach ($knowledges as $knowledge)
                   
    <div class="plan"> 
    <h3>{!! link_to_route('knowledges.show', $knowledge->title, ['id' => $knowledge->id]) !!}</h3>
    <p>分類 </p>
    <h4>{{ $knowledge->content }}</h4>
    <p>{{  $knowledge->user_id  }}</p>
    </div>
    @endforeach
    
    {{ $knowledges->links('pagination::bootstrap-4') }}