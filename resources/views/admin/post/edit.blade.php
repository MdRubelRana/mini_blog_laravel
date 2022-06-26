@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post Page</a></li>
                    <li class="breadcrumb-item active">Edit Post Page</li>
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
                            <h3 class="card-title">Edit post - {{ $post->title }}</h3>
                            <a href="{{ route ('post.index') }}" class="btn btn-primary">Back to Category Page</a>
                        </div>

                    </div>


                    <form action="{{ route('post.update', [$post->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="card-body">
                            @include('includes.errors')
                            <div class="form-group">
                                <label for="title">Post title</label>
                                <input type="text" class="form-control" value="{{ $post->title }}" name="title" id="title"
                                    placeholder="Enter post title">
                            </div>
                            <div class="form-group">
                                <label for="category">Post Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="" class="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($post->category_id == $category->id)
                                        selected
                                        @endif
                                        class="">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8">
                                        <label class="" for="image">Choose Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                    </div>
                                    <div class="col-4 text-right">
                                        <div class="" style="max-width: 100px; max-height: 100px; overflow: hidden; margin-left: auto;">
                                            <img src="{{ asset($post->image) }}" alt="post_image" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" class="form-control" id="description"
                                    placeholder="Description">{{ $post->description }}</textarea>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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
