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
                        <form action="{{ route('post.store') }}" method="post">
                            @csrf
                           <div class="mb-3">
                               <label for="" class="form-label">Post Title</label>
                               <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                               @error('title')
                               <p class="text-danger">{{ $message }}</p>
                               @enderror
                           </div>

                            <div class="mb-3">
                               <label for="" class="form-label">Category</label>
                                <select class="form-select @error('category') is-invalid @enderror" name="category">
                                    @foreach(\App\Models\Category::all() as $category)
                                        <option class="" value="{{ $category->id }} {{ old('category') == $category->id?'selected':''}}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                               @error('category')
                               <p class="text-danger">{{ $message }}</p>
                               @enderror
                           </div>

                            <div class="mb-3">
                               <label for="" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="7" >{{ old('category') }}</textarea>
                               @error('description')
                               <p class="text-danger">{{ $message }}</p>
                               @enderror
                           </div>

                            <div class="">
                                <button class="btn btn-primary">ADD</button>
                            </div>


                        </form>

                        @if(session('status'))
                            <p class="alert alert-success">{{ session('status') }}</p>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
