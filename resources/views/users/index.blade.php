<!--@if (count($users) > 0)-->
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
                        @if (count($knowledges) > 0)
                @foreach ($knowledges as $knowledge)
                    <div class="plan"> 
                        <h3>{!! link_to_route('knowledges.show', $knowledge->title, ['id' => $knowledge->id]) !!}</h3>
                        <p>分類</p>
                        <h4>{{ $knowledge->content }}</h4>
                        <p>{{  $knowledge->user_id  }}</p>
                    </div>
                @endforeach
            @endif
            {{ $knowledges->links('pagination::bootstrap-4') }}
            
            </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
<!--@endif-->