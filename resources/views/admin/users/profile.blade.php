@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Basic Form</h6>
                    @if (session('success'))
                        <h3 class="text-white bg-success">{{ session('success') }}</h3>
                    @endif
                    <form class="forms-sample" action="{{ route('profile.update') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Full Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputUsername1" autocomplete="off"
                                placeholder="Full Name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Old Password</label>
                            <input type="password" name="oldpassword" class="form-control" id="exampleInputPassword1" autocomplete="off"
                                placeholder="Old Password">
                            @if (session('error'))
                                <strong class="text-danger">{{ session('error') }}</strong>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" autocomplete="off"
                                placeholder="New Password">
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Basic Form</h6>
                    @if (session('success'))
                        <h3 class="text-white bg-success">{{ session('success') }}</h3>
                    @endif
                    <form class="forms-sample" action="{{ route('photo.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="photo" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
