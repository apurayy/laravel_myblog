@extends('layouts.dashboard');

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 card p-4">
            <div class="table-responsive">
                <table id="dataTableExample" class="table table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Images</th>
                        <th>Action</th>

                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($categoris as $sl=>$category)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $category->cat_name }}</td>
                            <td><img src="{{ asset('./upload/category') }}/{{ $category->cat_photo }}" alt=""></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3" style="">

                                      <a class="dropdown-item d-flex align-items-center" href="{{ route('category.edit', $category->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm mr-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> <span class="">Edit</span></a>

                                      <a class="dropdown-item d-flex align-items-center del" data-link="{{ route('category.del',$category->id) }}" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash icon-sm mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> <span class="">Delete</span>
                                    </a>


                                    </div>
                                  </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Category</h6>
                    @if (session('success'))
                        <h3 class="text-white bg-success">{{ session('success') }}</h3>
                    @endif

                    <form class="forms-sample" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputUsername1">Category Name</label>
                            <input type="text" class="form-control" name="cat_name" placeholder="Category Name">

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
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')
    <script>
        $('.del').click(function(){
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    var link = $(this).attr('data-link');
                    window.location.href = link;
                }
                });
        })
    </script>
    @if (session('success'))
        <script>
            Swal.fire(
                'Deleted',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif
@endsection
