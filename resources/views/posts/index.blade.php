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
                <div class="alert alert-success my-3">
                    {{ $message }}
                </div>
            @endif

            @foreach ($posts as $post)
                <div class="card my-3" style="width: 45.5rem;">
                    <div class="card-header">

                        <h4 class="card-title">
                            {{ $post->title }}
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-link" title="Edit this post">
                                <i class="fas fa-edit text-success"></i>
                            </a>
                            <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-link" title="Delete this post"
                                data-toggle="modal" data-target="#deleteModal">
                                <i class="fas fa-trash text-danger"></i>
                            </a>
                        </h4>

                        <div class="modal" tabindex="-1" id="deleteModal" aria-labelledby="deleteModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you sure deleting this post?</h5>
                                    </div>

                                    <div class="modal-body">
                                        <div class="alert alert-danger">
                                            <h6>
                                                <i class="fas fa-exclamation-triangle"></i>
                                                When you confirm you're not able to get this post back <br> So be carefull
                                                of
                                                your action</h6>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

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
