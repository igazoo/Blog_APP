@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">編集</div>
                <div class="card-body">
                    <form method="post" action="{{ route('posts.update', $post->id) }}" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="form-group row ">
                            <label class="col-md-4 col-form-label text-md-right">題名</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="content" value="{{$post->content}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- <label class="col-md-4 col-form-label text-md-right">画像</label> -->

                            <div class="col-md-6">
                                <!-- <input type="file" name="image"> -->
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    編集
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