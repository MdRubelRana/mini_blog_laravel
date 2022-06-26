@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">View Post Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post Page</a></li>
                    <li class="breadcrumb-item active">View Post Page</li>
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
                            <h3 class="card-title col-8">View post - {{ $post->title }}</h3>
                            <a href="{{ route('post.edit', [$post->id]) }}" class="btn btn-primary">Edit post</a>
                            <a href="{{ route ('post.index') }}" class="btn btn-primary">Back to Post Page</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 200px;">Image</th>
                                    <td>
                                        <div class="" style="max-width: 300px; max-height: 300px; overflow: hidden;">
                                            <img src="{{ asset($post->image) }}" alt="post_img" class="img-fluid">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Title</th>
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Slug</th>
                                    <td>{{ $post->slug }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Category</th>
                                    <td>{{ $post->category->name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Tags</th>
                                    <td>
                                        @foreach ($post->tags as $tag )
                                            <span class="badge badge-primary">{{ $tag->name }}</span>
                                            
                                        @endforeach    
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Author</th>
                                    <td>{{ $post->user->name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Description</th>
                                    <td>{!! $post->description !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


@endsection
