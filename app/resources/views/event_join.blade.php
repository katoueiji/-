@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>

    <table class="table table-bordered mt-3">
            <tr>
                <th>{{ $event->id }}</th>
                <td>{{ $event->capacity }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->image }}</td>
            </tr>

    </table>

    <div class="mt-4">
        @if($Event_user == 0)
        <form action="{{ route('event.join', ['id' => $event->id]) }}" method="POST">
            @csrf
            <label for='comment'>こめんト</label>
            <input type='text' class='form-control' name='comment'/>
            <button type="submit" class="btn btn-primary">参加する</button>
        </form>
        @else
        <button class="btn btn-primary" disabled>参加済み</button>
        @endif
    </div>
</div>
@endsection