@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="row my-5 mx-auto">
        <div class="col-lg-8">

            <div class="card">
                <div class="card-header bg-warning">
                    <span class="pull-left">
                        <a href="{{ route('posts.index') }}" class="btn btn-dark" title="Go Back">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </span>

                    <h2 class="text-center pb-3">Edit Post</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="input-group my-3">
                            <label for="title" class="input-group-text">
                                <strong>Title</strong>
                            </label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
                        </div>

                        <div class="input-group mb-3">
                            <label for="body" class="input-group-text">
                                <strong>Body</strong>
                            </label>
                            <textarea name="body" class="form-control" id="body" cols="5" rows="3">
                            {{ $post->body }}
                            </textarea>
                        </div>

                        <button class="btn btn-block btn-primary" type="submit">
                            <i class="fas fa-save"></i>
                            Save
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
