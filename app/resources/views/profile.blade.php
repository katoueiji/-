@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>

    <table class="table table-bordered mt-3">
            <tr>
                <img src="{{ asset('storage/profile/' . $date->image) }}" alt="プロフィール画像" width="120">
                <th>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $date->comment ?? '' }}</td>
            </tr>

            <tr>
                <td>{{ $main }}</td>
                <td>{{ $join }}</td>
            </tr>
            </table>
    </div>
    @can('admin-higher') {{-- 管理者に表示される --}}

    <div class="mt-4">
        <form action="{{ route('user.all', ['id' => $user->id]) }}" method="get">
            <button type="submit" class="btn btn-primary">戻る</button>
        </form>

    @if($user->is_active == 0)
        <form action="{{ route('user.hidden', ['id' => $user->id]) }}" method="get">
        <button type="submit" class="btn btn-primary">利用停止</button>
        </form>
    @else
        <form action="{{ route('user.active', ['id' => $user->id]) }}" method="get">
        <button type="submit" class="btn btn-primary">利用停止解除</button>
        </form>
    @endif



    @elsecan('user-higher') {{-- 一般ユーザーに表示される --}}
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
    <form action="{{ route('bookmark') }}" method="get">
        <button type="submit" class="btn btn-primary">ブックマーク一覧</button>
    </form>
    @endcan

@endsection