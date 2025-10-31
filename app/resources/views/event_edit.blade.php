@extends('layouts.app')

@section('content')
<div class="container">
    <h2>イベント編集</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </div>
    @endif

    <div class="mt-4">
        <form action="{{ route('event.Edit', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for='title'>タイトル</label>
                <input type='text' class='form-control' name='title' value="{{ $event->title }}"/>
            <label for='date'>日程</label>
                <input type='date' class='form-control' name='date' id='date' value="{{ $event->date }}"/>
            <label for='format'>イベント形式</label>
                <select name="format" class="form-control">
                    <option value="">イベント形式を選択</option>
                    <option value="0" {{ $event->format == "0" ? 'selected' : '' }}>Zoom</option>
                    <option value="1"  {{ $event->format == "1" ? 'selected' : '' }}>YouTube</option>
                </select>
            <label for='comment'>紹介文</label>
                <input type='text' class='form-control' name='comment' value="{{ $event->comment}}"/>
            <label for='capacity'>定員人数</label>
                <input type='text' class='form-control' name='capacity' value="{{ $event->capacity}}"/>
            <label for='type'>イベントの種類</label>
                <select name="type" class="form-control">
                    <option value="">イベントの種類を選択</option>
                    <option value="0" {{ $event->type == "0" ? 'selected' : '' }}>セミナー</option>
                    <option value="1" {{ $event->type == "1" ? 'selected' : '' }}>勉強会</option>
                    <option value="2" {{ $event->type == "2" ? 'selected' : '' }}>説明会</option>
                    <option value="3" {{ $event->type == "3" ? 'selected' : '' }}>講演会</option>
                </select>
            <input type="file" id="input" name="image" class="cursor_pointer">
            <img src="{{ asset('storage/profile/' . $event->image) }}" alt="プロフィール画像" width="120">
            <button type="submit" class="btn btn-primary">登録</button>
        </form>
    </div>
</div>
@endsection