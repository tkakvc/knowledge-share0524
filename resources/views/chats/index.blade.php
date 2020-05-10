<p>{{ dump($request_plans->request_user_id) }}</p>
<h1>メッセージ</h1>

@foreach ($chats as $chat)
    <p>{{ $chat->message }}</p>
@endforeach


    {!! Form::model($chats, ['route' => 'chat.submit']) !!}
    <div class="form-group">
    {!! Form::text('message',null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('送信', ['class' => 'btn btn-primary']) !!}
    
    {!! Form::close() !!}
