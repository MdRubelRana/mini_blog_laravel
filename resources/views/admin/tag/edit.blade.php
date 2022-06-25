@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Tag</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tag Page</a></li>
                    <li class="breadcrumb-item active">Edit Tag Page</li>
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
                            <h3 class="card-title">Edit tag - {{ $tag->name }}</h3>
                            <a href="{{ route ('tag.index') }}" class="btn btn-primary">Back to Tag Page</a>
                        </div>

                    </div>


                    <form action="{{ route('tag.update', [$tag->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="card-body">
                            @include('includes.errors')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{ $tag->name }}" class="form-control" name="name" id="name"
                                    placeholder="Enter tag name">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" value="{{ $tag->slug }}" class="form-control" name="slug" id="slug"
                                    placeholder="Enter category slug" disabled>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea value="" rows="4" type="text" name="description" class="form-control" id="description"
                                    placeholder="Description">{{ $tag->description }}</textarea>
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
