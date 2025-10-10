@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>
        <div class="mt-4">
        <form action="{{ route('user.profile', ['id' => $user]) }}" method="get">
            <button type="submit" class="btn btn-primary">プロフィール</button>
        </form>
    </div>

    <table class="table table-bordered mt-3">
            <tr>
                @foreach($event as $events)
                <th scope="col">
                 <a href="{{ route('event.detail', ['id' => $events['id']]) }}">#</a>
            </th>
                <th>{{ $events['id'] }}</th>
                <td>{{ $events['capacity'] }}</td>
                <td>{{ $events['title'] }}</td>
                <td>{{ $events['image'] }}</td>
                @endforeach
            </tr>

    </table>


</div>
@endsection