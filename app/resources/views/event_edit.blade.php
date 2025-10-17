@extends('layouts.app')

@section('content')
<div class="container">
    <h2>イベント編集</h2>

    <div class="mt-4">
        <form action="{{ route('event.Edit', ['id' => $event->id]) }}" method="POST">
            @csrf
            <label for='title'>名前</label>
            <input type='text' class='form-control' name='title' value="{{ $event->title }}"/>
            <label for='date'>日程</label>
            <input type='text' class='form-control' name='date' value="{{ $event->date }}"/>
            <label for='format'>イベント形式</label>
            <input type='text' class='form-control' name='format'value="{{ $event->format}}"/>
            <label for='image'>イメージ画像</label>
            <input type='text' class='form-control' name='image'value="{{ $event->image}}"/>
            <label for='comment'>紹介文</label>
            <input type='text' class='form-control' name='comment'value="{{ $event->comment}}"/>
            <label for='capacity'>定員人数</label>
            <input type='text' class='form-control' name='capacity'value="{{ $event->capacity}}"/>
            <button type="submit" class="btn btn-primary">登録</button>
        </form>
        <form action="{{ route('event.Destroy', ['id' => $event->id]) }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">イベントを削除</button>
    </div>
</div>
@endsection