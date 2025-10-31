@extends('layouts.app')

@section('content')
<div class="container">
    <h2>参加ユーザー一覧表示</h2>

<table class="table table-bordered mt-3">
    <tr>
        @foreach($eu as $eus)
        <th scope="col">
            </th>
            <tr>
                <td>{{ $eus->user->name }}</td>
                <td>{{ $eus->user->email }}</td>
                <td>{{ $eus->event->title }}</td>
            </tr>
            @endforeach

    </table>
    @endsection