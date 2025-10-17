@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>

    <table class="table table-bordered mt-3">
            <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $date->comment ?? '' }}</td>
                <td>{{ $date->image ?? '' }}</td>
            </tr>

    </table>
    </div>
    <form action="{{ route('profile.edit', ['id' => $user->id]) }}" method="get">
        <button type="submit" class="btn btn-primary">プロフィール編集</button>
    </form>
    <form action="{{ route('user.edit', ['id' => $user->id]) }}" method="get">
        <button type="submit" class="btn btn-primary">ログアウト・退会</button>
    </form>
    <form action="{{ route('event.main', ['id' => $user->id]) }}" method="get">
        <button type="submit" class="btn btn-primary">主催イベント一覧</button>
    </form>
    <form action="{{ route('user.join', ['id' => $user->id]) }}" method="get">
        <button type="submit" class="btn btn-primary">参加イベント一覧</button>
    </form>
@endsection