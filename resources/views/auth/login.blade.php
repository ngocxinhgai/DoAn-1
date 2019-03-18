<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts._head')
    <link rel="stylesheet" href="{{ asset('assets/css/user-login.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
            <div class="card-body">
                <h5 class="card-title text-center">Sign In</h5>
                {!! Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'form-signin']) !!}
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                        <label for="inputEmail">Email address</label>
                    </div>
                    @if ($errors->has('email'))
                        <p class="help-block validated" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </p>
                    @endif

                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                    </div>
                    @if ($errors->has('password'))
                        <p class="help-block validated" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </p>
                    @endif

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                {!! Form::close() !!}
            </div>
            </div>
        </div>
        </div>
    </div>
    @include('layouts._script')
</body>
