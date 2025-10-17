@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>

    <h2>本当にキャンセルしますか？</h2>

    <table class="table table-bordered mt-3">
            <tr>
                <th>{{ $event->id }}</th>
                <td>{{ $event->capacity }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->image }}</td>
            </tr>

    </table>

    <div class="mt-4">
        <form action="{{ route('user.join', ['id' => $event->id]) }}" method="get">
            <button type="submit" class="btn btn-primary">戻る</button>
        </form>
        <form action="{{ route('user.cancel', ['id' => $event->id]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">キャンセル</button>
        </form>
    </div>
</div>
@endsection