@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>

    <table class="table table-bordered mt-3">
            <tr>
                <td><img src="{{ asset('storage/profile/' . $event['image']) }}" width="120"></td>
                <td>{{ $event->id }}</td>
                <td>{{ $event->capacity }}</td>
                <td>{{ $event->title }}</td>
            </tr>

    </table>
    @can('admin-higher') {{-- 管理者に表示される --}}
    <div class="mt-4">
        <form action="{{ route('event.all') }}" method="get">
            <button type="submit" class="btn btn-primary">戻る</button>
        </form>
        
        <form action="{{ route('event.hidden', ['id' => $event->id]) }}" method="get">
            <button type="submit" class="btn btn-primary">非表示にする</button>
        </form>
    </div>
    @elsecan('user-higher') {{-- 一般ユーザーに表示される --}}
    <div class="mt-4">
        <form action="{{ route('event.join', ['id' => $event->id]) }}" method="get">
            <button type="submit" class="btn btn-primary">参加する</button>
        </form>

        <form action="{{ route('event.report', ['id' => $event->id]) }}" method="get">
            <button type="submit" class="btn btn-primary">報告する</button>
        </form>
    </div>
    @endcan
</div>
@endsection