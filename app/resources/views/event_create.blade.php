@extends('layouts.app')

@section('content')
<div class="container">
    <h2>イベント作成</h2>

        @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </div>
    @endif



    <div class="mt-4">
        <form action="{{ route('event.Create', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for='title'>タイトル</label>
                <input type='text' class='form-control' name='title'/>
            <label for='date'>日程</label>
                <input type='date' class='form-control' name='date' id='date' value="{{ old('date') }}"/>
            <label for='format'>イベント形式</label>
                <select name="format" class="form-control">
                    <option value="">イベント形式を選択</option>
                    <option value="0" {{ request('format') == "0" ? 'selected' : '' }}>Zoom</option>
                    <option value="1"  {{ request('format') == "1" ? 'selected' : '' }}>YouTube</option>
                </select>
            <label for='comment'>紹介文</label>
                <input type='text' class='form-control' name='comment'/>
            <label for='capacity'>定員人数</label>
                <input type='text' class='form-control' name='capacity'/>
            <label for='type'>イベントの種類</label>
                <select name="type" class="form-control">
                    <option value="">イベントの種類を選択</option>
                    <option value="0" {{ request('type') == "0" ? 'selected' : '' }}>セミナー</option>
                    <option value="1" {{ request('type') == "1" ? 'selected' : '' }}>勉強会</option>
                    <option value="2" {{ request('type') == "2" ? 'selected' : '' }}>説明会</option>
                    <option value="3" {{ request('type') == "3" ? 'selected' : '' }}>講演会</option>
                </select>
            <label for='image'>イメージ画像</label>
                <input type="file" id="input" name="image" class="cursor_pointer">
            <button type="submit" class="btn btn-primary">登録</button>
        </form>
    </div>
</div>
@endsection