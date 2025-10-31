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

    <div class="mt-4">
        <form action="{{ route('profile.edit', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <label for='name'>名前</label>
            <input type='text' class='form-control' name='name' value="{{ $user->name }}"/>
            <label for='email'>メアド</label>
            <input type='text' class='form-control' name='email' value="{{ $user->email }}"/>
            <label for='comment'>コメント</label>
            <input type='text' class='form-control' name='comment'value="{{ $date->comment ?? ''}}"/>
            <label for='image'>プロフィール画像</label>
            <input type="file" id="input" name="image" class="cursor_pointer">
            <img src="{{ asset('storage/profile/' . $date->image) }}" alt="プロフィール画像" width="120">
            <button type="submit" class="btn btn-primary">更新する</button>
        </form>
    </div>
</div>
@endsection