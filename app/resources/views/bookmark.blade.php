@extends('layouts.app')

@section('content')
<div class="container">
    <h2>データ確認</h2>
    @foreach($event as $events)
    <table class="table table-bordered mt-3">
        <th scope="col">
        <form action="{{ route('event.detail', ['id' => $events['id']]) }}" method="get">
            <button type="submit" class="btn btn-primary">詳細</button>
        </form>
            </th>
                <th>{{ $events['id'] }}</th>
                <td>{{ $events['capacity'] }}</td>
                <td>{{ $events['title'] }}</td>
                <td>{{ $events['image'] }}</td>

                <td>
                <div class="article-control">
                @if (!Auth::user()->is_bookmark($events->id))
                <form action="{{ route('bookmark.store', $events) }}" method="post">
                    @csrf
                    <button>お気に入り登録</button>
                </form>
                @else
                <form action="{{ route('bookmark.destroy', $events) }}" method="post">
                    @csrf
                    @method('delete')
                    <button>お気に入り解除</button>
                </form>
                @endif
                </div>
                </td>
        </article>

    </table>
    </div>

@endforeach
@endsection