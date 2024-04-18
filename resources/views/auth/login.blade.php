    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>NobleUI Responsive Bootstrap 4 Dashboard Template</title>
        <!-- core:css -->
        <link rel="stylesheet" href="{{ asset('dashboard_assets/vendors/core/core.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_assets/fonts/feather-font/css/iconfont.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_assets/css/demo_1/style.css') }}">
        <link rel="shortcut icon" href="{{ asset('dashboard_assets/images/favicon.png') }}" />
    </head>

    <body>
        <div class="main-wrapper">
            <div class="page-wrapper full-page">
                <div class="page-content">

                    <div class="row">
                        <div class="col-lg-6 col-xl-4 mx-auto">
                            <div class="card">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <a href="#" class="noble-ui-logo d-block mb-2">Web<span>School</span></a>
                                    <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your
                                        account.</h5>
                                    <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                Remember me
                                            </label>
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                            <button type="button"
                                                class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                <i class="btn-icon-prepend" data-feather="twitter"></i>
                                                Login with twitter
                                            </button>
                                        </div>
                                        <a href="{{ route('register') }}" class="d-block mt-3 text-muted">Not a user? Sign
                                            up</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- core:js -->
        <script src="{{ asset('dashboard_assets/vendors/core/core.js') }}"></script>
        <!-- endinject -->
        <!-- plugin js for this page -->
        <!-- end plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('dashboard_assets/vendors/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('dashboard_assets/js/template.js') }}"></script>
        <!-- endinject -->
        <!-- custom js for this page -->
        <!-- end custom js for this page -->
    </body>

    </html>
