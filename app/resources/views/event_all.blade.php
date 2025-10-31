@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>

<table class="table table-bordered mt-3">
    <tr>
        @foreach($event as $events)
        <th scope="col">
        <form action="{{ route('event.detail', ['id' => $events['id']]) }}" method="get">
            <button type="submit" class="btn btn-primary">詳細</button>
        </form>
            </th>
                <th>{{ $events['id'] }}</th>
                <td>{{ $events['capacity'] }}</td>
                <td>{{ $events['title'] }}</td>
                <td>{{ $events['image'] }}</td>

                <td>
                <form action="{{ route('event.hidden', ['id' => $events['id']]) }}" method="get">
                <button type="submit" class="btn btn-primary">非表示</button>
                </form>
                </td>
            </tr>

            @endforeach

    </table>
    @endsection