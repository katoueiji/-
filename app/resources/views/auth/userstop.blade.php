@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h2>アカウント利用停止中</h2>
    <p>このアカウントは、停止されているため<br>
       利用することができません。</p>

        <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
</div>
@endsection