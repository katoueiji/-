@extends('layouts.app')

@section('content')
<div class="container">
    <h2>イベント作成</h2>

    <div class="mt-4">
        <form action="{{ route('event.Create', ['id' => $user->id]) }}" method="POST">
            @csrf
            <label for='title'>タイトル</label>
            <input type='text' class='form-control' name='title'/>
            <label for='date'>日程</label>
            <input type='text' class='form-control' name='date'/>
            <label for='format'>イベント形式</label>
            <input type='text' class='form-control' name='format'/>
            <label for='image'>イメージ画像</label>
            <input type='text' class='form-control' name='image'/>
            <label for='comment'>紹介文</label>
            <input type='text' class='form-control' name='comment'/>
            <label for='capacity'>定員人数</label>
            <input type='text' class='form-control' name='capacity'/>
            <label for='type'>イベントの種類</label>
            <input type='text' class='form-control' name='type'/>
            <button type="submit" class="btn btn-primary">登録</button>
        </form>
    </div>
</div>
@endsection