@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>
    <h2>本当に利用停止解除しますか？</h2>

    <table class="table table-bordered mt-3">
            <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>

    </table>
        <div class="mt-4">
        <form action="{{ route('user.all', ['id' => $user->id]) }}" method="get">
            <button type="submit" class="btn btn-primary">戻る</button>
        </form>
        
        <form action="{{ route('user.active', ['id' => $user->id]) }}" method="post">
        @csrf
            <button type="submit" class="btn btn-primary">解除する</button>
        </form>
    </div>
</div>
@endsection