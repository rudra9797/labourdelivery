@extends('layouts.app')
@section('content')
    <div class="delivery-section">
        <div class="container p-5">
            <p class="delivery-text">Login</p>
            <div class="row driver-form  ps-sm-5">

                <div class="login-page">
                    {{-- @if ($errors->has('email'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{ $errors->first('email') }}
                        </div>
                    @endif --}}

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="col-md-12 {!! $errors->has('email') ? 'has-error' : '' !!}">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" name="email"
                                class="form-control ($errors->has('email') ? ' is-invalid' : '')"
                                id="exampleFormControlInput1">
                            {!! $errors->first('email', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                        <div class="col-md-12 {!! $errors->has('password') ? 'has-error' : '' !!}">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" name="password"
                                class="form-control ($errors->has('password') ? ' is-invalid' : '')"
                                id="exampleFormControlInput1">
                            {!! $errors->first('password', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                        <div class="col-md-12 forgot-password mt-4">
                            <p><a href="{{ route('password.request') }}"> Forgot Password? </a></p>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" value="Login" class="apply-btn">
                        </div>
                        <div class="col-md-12 need-info-text">
                            <p>Need info about <a href="{{ route('register') }}">sign up</a> if you don't have an account
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
