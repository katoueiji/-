@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </div>
    @endif

    <table class="table table-bordered mt-3">
            <tr>
                <th>{{ $event->id }}</th>
                <td>{{ $event->capacity }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->image }}</td>
            </tr>

    </table>

    <div class="mt-4">
        <form action="{{ route('event.report', ['id' => $event->id]) }}" method="POST">
            @csrf
            <label for='comment'>こめんト</label>
            <input type='text' class='form-control' name='comment'/>
            <button type="submit" class="btn btn-primary">報告する</button>
        </form>

        <form action="{{ route('event.detail', ['id' => $event->id]) }}" method="GET">
            <button type="submit" class="btn btn-primary">キャンセル</button>
        </form>
    </div>
</div>
@endsection