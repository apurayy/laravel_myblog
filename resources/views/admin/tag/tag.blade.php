@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4>Tag List</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>SL</th>
                        <th>Tag Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($tags as $sl=>$tag)
                    <tr>
                        <td>{{ $sl+1 }}.</td>
                        <td>{{ $tag->tag_name }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('tag.del', $tag->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5>Add New Tag</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('tag.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tag Name</label>
                        <input type="text" class="form-control" name="tag_name" placeholder="Tag Name">

                        @error('tag_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add Tag">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
