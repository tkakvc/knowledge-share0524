<header>
    <div class="header-left">
      <h1><a>{!! link_to_route('knowledges.index','ナレッジシェア') !!}</a></h1>
    </div>
    <div class="navbar">
      @if (Auth::check())
      <ul>
          <li><a>{!! link_to_route('knowledges.index','トップ') !!}</a></li>
          <li><a> {!! link_to_route('knowledges.create', 'プラン作成') !!}</a></li>
          <li><a> {!! link_to_route('mypage', 'マイページ') !!}</a></li>
          <li><a> {!! link_to_route('logout.get', 'ログアウト') !!}</a></li>
        
      </ul> 
      @else
      <ul>
          <li><a> {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-primary']) !!} </a></li>
          <li><a>{!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-primary']) !!}</a></li>
      </ul>
      @endif
    </div>
</header>