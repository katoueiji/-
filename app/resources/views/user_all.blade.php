@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>

<table class="table table-bordered mt-3">
    <tr>
        @foreach($user as $users)
        <th scope="col">
        <form action="{{ route('user.profile', ['id' => $users['id']]) }}" method="get">
            <button type="submit" class="btn btn-primary">詳細</button>
        </form>
            </th>
                <th>{{ $users['id'] }}</th>
                <td>{{ $users['name'] }}</td>
                <td>{{ $users['email'] }}</td>

                <td>
                @if($users['is_active'] == 0)
                    <form action="{{ route('user.hidden', ['id' => $users['id']]) }}" method="get">
                        <button type="submit" class="btn btn-primary">利用停止</button>
                    </form>
                @else
                    <form action="{{ route('user.active', ['id' => $users['id']]) }}" method="get">
                    <button type="submit" class="btn btn-primary">利用停止解除</button>
                    </form>
                 @endif
                </td>
            </th>
        </tr>
           

        @endforeach

    </table>
    @endsection