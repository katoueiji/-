@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>

    <div class="mt-4">
        <form action="{{ route('profile.edit', ['id' => $user->id]) }}" method="POST">
            @csrf
            <label for='name'>名前</label>
            <input type='text' class='form-control' name='name' value="{{ $user->name }}"/>
            <label for='email'>メアド</label>
            <input type='text' class='form-control' name='email' value="{{ $user->email }}"/>
            <label for='comment'>コメント</label>
            <input type='text' class='form-control' name='comment'value="{{ $date->comment}}"/>
            <label for='image'>プロフィール画像</label>
            <input type='text' class='form-control' name='image'value="{{ $date->image}}"/>
            <button type="submit" class="btn btn-primary">更新する</button>
        </form>
    </div>
</div>
@endsection