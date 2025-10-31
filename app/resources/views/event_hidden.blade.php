@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>
    <h2>本当に非表示にしますか？</h2>

    <table class="table table-bordered mt-3">
            <tr>
                <td><img src="{{ asset('storage/profile/' . $event['image']) }}" width="120"></td>
                <td>{{ $event->id }}</td>
                <td>{{ $event->capacity }}</td>
                <td>{{ $event->title }}</td>
            </tr>

    </table>
        <div class="mt-4">
        <form action="{{ route('event.detail', ['id' => $event->id]) }}" method="get">
            <button type="submit" class="btn btn-primary">戻る</button>
        </form>
        
        <form action="{{ route('event.hidden', ['id' => $event->id]) }}" method="post">
        @csrf
            <button type="submit" class="btn btn-primary">非表示にする</button>
        </form>
    </div>
</div>
@endsection