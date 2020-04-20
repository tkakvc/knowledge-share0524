<ul class="list-unstyled">
    @foreach ($knowledges as $knowledge)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($knowledge->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                 $knowledge->user->name <span class="text-muted">posted at {{ $knowledge->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($knowledge->content)) !!}</p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $knowledges->links('pagination::bootstrap-4') }}