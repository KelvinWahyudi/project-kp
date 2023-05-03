@extends('layout.master')

{{-- @section('container') --}}
<head>
    <title>LAWANG AGUNG SUKSES - Register</title>
</head>
<div class="container py-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <img src="img/logo.png" class="mx-auto d-block" width="50%"/>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />              
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4">
                            <x-label for="name" :value="__('Nama Lengkap')" />
                            <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                        <div class="mb-4">
                            <x-label for="email" :value="__('Alamat Email')" />
                            <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                        </div>
                        <div class="mb-4">
                            <x-label for="password" :value="__('Kata Sandi')" />
                            <x-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                        <div class="form-text">
                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                        </div>
                        </div>
                        <div class="mb-4">
                            <x-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
                            <x-input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required />
                        </div>
                        <div class="col-md-8 offset-md-5">
                            <a class="btn btn-link" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                            <button class="btn btn-primary ml-4">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}
