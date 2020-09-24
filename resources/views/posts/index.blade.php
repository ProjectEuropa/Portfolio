@extends('layouts.app')

@section('content')
<div class="card-header">{{ __('Board') }}</div>
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    @foreach($posts as $post)
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <h5 class="card-title">
                カテゴリー:
                 <a href="{{ route('posts.index', ['category_id' => $post->category_id]) }}">
                    {{ $post->category->category_name }}
                </a>
            </h5>

            <h5 class="card-title">
                投稿者:
                <a href="{{ route('users.show', $post->user_id) }}">{{ $post->user->name }}</a>
            </h5>
            <p class="card-text">{{ $post->content }}</p>
            <img src="{{ asset('storage/image/'.$post->image) }}" alt="">
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細</a>
          </div>
        </div>
    @endforeach

@if(isset($category_id))
    {{ $posts->appends(['category_id' => $category_id])->links()  }}
 @elseif(isset($search_query))
    {{ $posts->appends(['search' => $search_query])->links() }}
@else
    {{ $posts->links() }}
@endif





</div>
@endsection
