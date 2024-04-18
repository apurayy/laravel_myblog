@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-body">
        <h6 class="card-title">Add Category</h6>
        @if (session('success'))
            <h3 class="text-white bg-success">{{ session('success') }}</h3>
        @endif

        <form class="forms-sample" action="{{ route('category.update') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">

                <input type="hidden" name="category_id" value="{{ $category->id }}">

                <label for="exampleInputUsername1">Category Name</label>
                <input type="text" class="form-control" name="cat_name" value="{{ $category->cat_name }}">

                @error('cat_name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group">
                <label>File upload</label>
                <input type="file" name="cat_photo" class="file-upload-default">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
                @error('cat_photo')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="mt-2">
                    <img width="250" height="250" src="{{ asset('upload/category') }}/{{ $category->cat_photo }}" alt="">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>

        </form>
    </div>
</div>

@endsection
