@section('interdisciplinary', 'Reset Password')
@extends('layouts.app')
@section('content')
<section class="title-box">
	<div class="container">
		<div class="row">
			<div class="col-12 py-3 py-md-4">
				<h2 class="page-title">{{ __('Reset Password') }}</h2>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card p-4 p-lg-5 reset-pwd">
					{{-- {!! Form::open(['route' => 'password.update']) !!} --}}
                    <form action="{{ route('password.update') }}" method="POST">
                    @csrf
					<input type="hidden" name="token" value="{{ request()->route('token') }}">
					<div class="row py-4">
						<div class="col-md-12 my-3">
							<div class=" {!! ($errors->has('email') ? ' has-error' : '') !!}">
                                <label for="email">Email</label>
                                <input name="email" class="form-control ($errors->has('email') ? 'is-invalid' : '')"/>
								{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="col-md-12">
							<div class="{!! ($errors->has('password') ? 'has-error' : '') !!}">
                                <label for="password">Password</label>
								<input id="password" type="password" class=" form-control @error('password') is-invalid @enderror" name="password">
								{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="col-md-12">
							<div class="{!! ($errors->has('password_confirmation') ? 'has-error' : '') !!}">
                                <label for="password_confirmation">Confirm Password</label>
								<input id="password-confirm" type="password" name="password_confirmation" class=" form-control @error('password_confirmation') is-invalid @enderror">
								{!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="col-md-12 art-submit-btn py-3">
							<button class="btns" type="submit" id="submitButton">{{ __('Reset Password') }}</button>
						</div>

					</div>
                    </form>
					{{-- {!! Form::close() !!} --}}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
