@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>

    <table class="table table-bordered mt-3">
            <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $date->comment ?? '' }}</td>
                <td>{{ $date->image ?? '' }}</td>
            </tr>

    </table>
    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">ログアウト</button>
    </form>
    <form action="{{ route('user.edit', ['id' => $user->id]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">退会</button>
    </form>
@endsection