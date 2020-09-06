@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">index</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="post_index" style="text-align: center;">

                        @foreach($posts as $post)
                        <div class="post_content" style="text-align: center;">
                            {{$post->content}}
                            <a href="{{route('posts.edit', $post->id)}}">編集</a>

                        </div>
                        <form action="{{route('posts.destroy', $post->id)}}" method="post" id="{{$post->id}}">
                            @csrf
                            @method('DELETE')
                            <a href="#" data-id="{{$post->id}}" onclick="deletePost(this);">削除</a>
                        </form>
                        <img src='/storage/images/{{$post->image}}' height="300px" width="400px">

                        <a href="{{route('posts.show', $post->id)}}">
                            @if ($post->comments->count())
                            <span class="badge badge-primary">
                                コメント {{ $post->comments->count() }}件
                            </span>
                            @else
                            <span class="badge badge-danger">
                                コメント 0件
                            </span>
                            @endif
                        </a>


                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    /*******
  削除ボタンを押して一旦jsで確認メッセージを出す
  *******/
    //-->>
    function deletePost(e) {
        'user strict';
        if (confirm('本当に削除してもいいですか？')) {
            document.getElementById(e.dataset.id).submit();
        }
    }
</script>