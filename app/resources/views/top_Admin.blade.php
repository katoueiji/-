@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>

    <div class="mt-4">
        <form action="{{ route('event.all') }}" method="get">
            <button type="submit" class="btn btn-primary">全イベント一覧表示</button>
        </form>
    </div>

    <div class="mt-4">
        <form action="{{ route('user.all') }}" method="get">
            <button type="submit" class="btn btn-primary">全ユーザー一覧表示</button>
        </form>
    </div>

    <div class="mt-4">
        <form action="{{ route('join.user') }}" method="get">
            <button type="submit" class="btn btn-primary">参加ユーザー一覧表示</button>
        </form>
    </div>
</div>
@endsection