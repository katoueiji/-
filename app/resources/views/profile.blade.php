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
    <form action="{{ route('profile.edit', ['id' => $user->id]) }}" method="get">
        <button type="submit" class="btn btn-primary">プロフィール編集</button>
    </form>
@endsection