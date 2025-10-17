@extends('layouts.app')

@section('content')
<div class="container">
    <h2>主催イベント一覧</h2>

    <form action="{{ route('event.Create', ['id' => $user->id]) }}" method="get">
            <button type="submit" class="btn btn-primary">作成する</button>
        </form>

    <table class="table table-bordered mt-3">
            <tr>
                @foreach($events as $event)
                <th scope="col">
                 <a href="{{ route('event.detail', ['id' => $event['id']]) }}">#</a>
            </th>
                <th>{{ $event['id'] }}</th>
                <th>{{ $event['user_id'] }}</th>
                <th>{{ $event['capacity'] }}</th>
                <th>{{ $event['title'] }}</th>
                <th>{{ $event['image'] }}</th>
                <th>{{ $user->id }}</th>

            <td>
            <a href="{{ route('event.Edit', ['id' => $event['id']]) }}">
            <button type="submit" class="btn btn-primary">編集</button></a>
            </td>
            </tr>

                @endforeach
    </table>


</div>
@endsection