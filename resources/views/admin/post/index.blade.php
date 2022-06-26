@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Post Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Post Page</li>
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
                            <h3 class="card-title">Post List</h3>
                            <a href="{{ route ('post.create') }}" class="btn btn-primary">Create Post</a>
                        </div>

                    </div>

                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($posts->count())
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>
                                                <div class="" style="max-width: 70px; max-height: 70px; overflow: hidden;">
                                                    <img src="{{ asset($post->image) }}" alt="post_img" class="img-fluid">
                                                </div
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->category_id }}</td>
                                            <td>{{ $post->user_id }}</td>
                                            <td>{{ $post->action }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('post.edit', [$post->id]) }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('post.destroy', [$post->id]) }}" method="POST" class="mr-1">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                                {{-- <a href="{{ route('category.show', [$category->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                        <tr>
                                            <td colspan="6">
                                                <h5 class="text-center">No post found.</h5>
                                            </td>
                                        </tr>
                                @endif
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
