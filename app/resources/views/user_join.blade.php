@extends('layouts.app')

@section('content')
<div class="container">
    <h2>参加イベント一覧</h2>

    <table class="table table-bordered mt-3">
            <tr>
                @foreach($events as $event)
                @if($event)
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
            <a href="{{ route('user.cancel', ['id' => $event['id']]) }}">
            <button type="submit" class="btn btn-primary">取り消し</button></a>
            </td>
            </tr>
@endif
                @endforeach
    </table>


</div>
@endsection