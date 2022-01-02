@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-2">
                    <div class="card-header">
                        Post Manage
                    </div>
                    <div class="card-body">

                        @if(session('status'))
                            <p class="alert alert-success">{{ session('status') }}</p>
                        @endif

                        <div class="d-flex justify-content-between">
                            {{ $posts->links() }}
                            <div>
                                <form>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search" name="search">
                                        <button class="btn btn-outline-primary">
                                            <i class="feather-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <table class="table align-middle">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Owner</th>
                                <th>Control</th>
                                <th>Created_At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ \Illuminate\Support\Str::words($post->title,15) }}</td>
                                    <td>{{ $post->category->title }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="" class="btn btn-outline-primary">
                                                <i class="feather-info"></i>
                                            </a>
                                            <a href="" class="btn btn-outline-primary">
                                                <i class="feather-edit-3"></i>
                                            </a>
                                            <button form="postDelete{{$post->id}}" class="btn btn-outline-primary">
                                                <i class="feather-trash"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('post.destroy',$post->id) }}" class="d-none" method="post" id="postDelete{{$post->id}}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                    <td>
                                        <p class="mb-0 small"><i class="feather-calendar"></i>{{ $post->created_at->format('d m y') }}</p>
                                        <p class="mb0 small"><i class="feather-clock"></i>{{ $post->created_at->format('h m a') }}</p>
                                        {{ $post->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">There is no Post.</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
