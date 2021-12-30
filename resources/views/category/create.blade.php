@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-2">
                    <div class="card-header">
                        Category Manage
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="col-4 d-flex">
                                <div class="mx-2">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                </div>

                                <div class="">
                                    <button class="btn btn-primary">Add</button>
                                </div>

                            </div>
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </form>

                        @if(session('status'))
                            <p class="alert alert-success">{{ session('status') }}</p>
                        @endif
                        @include('category.list')
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
