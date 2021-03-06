@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Post Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post Page</a></li>
                    <li class="breadcrumb-item active">Create Post Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Create a new post</h3>
                            <a href="{{ route ('post.index') }}" class="btn btn-primary">Back to Post Page</a>
                        </div>

                    </div>


                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            @include('includes.errors')
                            <div class="form-group">
                                <label for="title">Post title</label>
                                <input type="text" class="form-control" value="{{ old('title') }}" name="title"
                                    id="title" placeholder="Enter post title">
                            </div>
                            <div class="form-group">
                                <label for="category">Post Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="" class="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" class="">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="" for="image">Choose Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group d-flex flex-wrap">
                                <label for="category" class="mr-4">Select Tags</label>
                                @foreach ($tags as $tag)
                                <div class="form-check mr-4">
                                    <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{ $tag->id }}"
                                        value="{{ $tag->id }}">
                                    <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" class="form-control" id="description"
                                    placeholder="Description">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


@endsection
@section('style')
{{-- Summernote --}}
<link rel="stylesheet" href="{{ asset('admin') }}/css/summernote-bs4.min.css">
@endsection

@section('script')
{{-- Summernote --}}
<script src="{{ asset('admin') }}/js/summernote-bs4.min.js"></script>
<script>
    $('#description').summernote({
        placeholder: 'Write here',
        tabsize: 2,
        height: 250
    });

</script>
@endsection
