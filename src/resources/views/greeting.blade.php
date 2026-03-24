<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>あいさつ一覧</title>
</head>
<body>
    <h1>あいさつを登録する</h1>
    <form action="/greeting" method="POST">
        @csrf
        <div>
            <label>名前：<input type="text" name="name"></label>
        </div>
        <div>
            <label>あいさつ：<input type="text" name="message"></label>
        </div>
        <button type="submit">登録</button>
    </form>

    <h1>あいさつ一覧</h1>
    @forelse ($greetings as $greeting)
        <p>
            {{ $greeting->person->name }}：{{ $greeting->message }}
            <form action="/greeting/{{ $greeting->id }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
        </p>
    @empty
        <p>まだ登録されていません。</p>
    @endforelse
</body>
</html>
