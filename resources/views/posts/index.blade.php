@extends('layouts.app')

@section('title', 'Post Management')

@section('content')
    <div class="row my-5">
        <div class="col-md-8">

            <h2 class="text-sm-left">
                Post Management
            </h2>

            <p class="text-muted text-sm-left">
                Let everyone in the world see your amazing post
            </p>

            <a href="{{ route('posts.create') }}" class="btn btn-block btn-primary text-sm-center" title="Create Post">
                <i class="fas fa-plus"></i>
            </a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            @foreach ($posts as $post)
                <div class="card my-3" style="width: 45.5rem;">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ $post->title }}
                        </h4>
                    </div>

                    <div class="card-body">
                        <p class="card-text">
                            {{ $post->body }}
                        </p>

                        <h6 class="card-subtitle">
                            Created at <span class="text-muted">
                                {{ date_format($post->created_at, 'jS M Y') }}
                            </span>
                        </h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {!! $posts->links() !!}
@endsection
