@extends('layouts.app')
@section('content')
    <div class="delivery-section">
        <div class="container p-5">
            <p class="delivery-text">Sign Up</p>
            <div class="row driver-form  ps-sm-5">
                <form action="{{ route('register') }}" method="POST">
                    @csrf()
                    <div class="col-md-6 ($errors->has('first_name') ? 'has-error' : '') ">
                        <label for="exampleFormControlInput1" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control ($errors->has('first_name') ? ' is-invalid' : '')" id="exampleFormControlInput1">
                        {!! $errors->first('first_name', '<span class="help-block text-danger">:message</span>') !!}
                    </div>
                    <div class="col-md-6 ($errors->has('last_name') ? 'has-error' : '')">
                        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control ($errors->has('last_name') ? ' is-invalid' : '')" id="exampleFormControlInput1">
                        {!! $errors->first('last_name', '<span class="help-block text-danger">:message</span>') !!}
                    </div>

                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">Company Name (optional)</label>
                        <input type="text" name="company_name" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="col-md-12 ($errors->has('email') ? 'has-error' : '')">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control ($errors->has('email') ? ' is-invalid' : '')" id="exampleFormControlInput1">
                        {!! $errors->first('email', '<span class="help-block text-danger">:message</span>') !!}
                    </div>
                    <div class="col-md-6 ($errors->has('password') ? 'has-error' : '') ">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
                        {!! $errors->first('password', '<span class="help-block text-danger">:message</span>') !!}
                    </div>
                    <div class="col-md-6 ($errors->has('password_confirmation') ? 'has-error' : '')">
                        <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput1">
                        {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="col-md-6 ">
                        <input type="submit" value="Sign Up" class="apply-btn">
                    </div>
                    <div class="col-md-6 login-section">
                        <p>Already have an account? <a href="{{ route('login') }}">Login.</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
