@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach($comments as $comment)
                    @foreach($users as $user)
                    @if($user->id === $comment->user_id)
                    {{$user->name}}::
                    @endif
                    @endforeach
                    {{$comment->body}}
                    @endforeach

                    <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
                        @csrf

                        <input name="post_id" type="hidden" value="{{ $post->id }}">

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">本文</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="body">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    コメント
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection