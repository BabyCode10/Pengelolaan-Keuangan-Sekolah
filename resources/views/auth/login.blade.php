<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin - Login</title>

        <!-- Custom fonts for this template-->
        <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template-->
        <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">
    </head> 
    <body class="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-label-group">
                                <input name="email" type="email" id="inputEmail" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" required="required" autofocus="autofocus">
                                <label for="inputEmail" class="col-form-label-sm">{{ __('E-Mail Address') }}</label>
                                @error('email')
                                    <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <input name="password" type="password" id="inputPassword" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Password" required="required">
                                <label for="inputPassword" class="col-form-label-sm">{{ __('Password') }}</label>
                                @error('password')
                                    <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input name="remember" type="checkbox" value="remember-me" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-block">{{ __('Login') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    </body>
</html>
