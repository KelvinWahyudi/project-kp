@extends('layout.master')

{{-- @section('container') --}}
<head>
    <title>LAS - Login</title>
</head>
<main class="login-form">
    <div class="container py-5">
        <div class="d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <img src="img/logo.png" class="mx-auto d-block" width="80%"/>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email_address" class="form-label">Alamat Email</label>
                                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <div class="form-text">
                                    We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Kata Sandi</label>
                                <input type="password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                <span class="form-text">
                                    Must be 8-20 characters long.
                                </span>
                            </div>
                            <div class="mb-3 form-check">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">Remember Me
                                    </label>
                                </div>        
                            </div>
                            <div class="col-md-8 offset-md-6">
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('Not Registered?') }}
                                </a>
                                <button type="submit" class="btn btn-success ml-4">
                                    Login
                                </button>
                            </div>
                        </form>     
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{-- @endsection --}}