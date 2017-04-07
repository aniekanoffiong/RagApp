@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <h2 class="text-center">Register</h2>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
						<div class="row">
							<div class="form-group col-md-6{{ $errors->has('first_name') ? ' has-error' : '' }}">
								<label for="first_name" class="control-label sr-only">First Name</label>
								<input id="first_name" type="text" placeholder="First Name" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
								@if ($errors->has('first_name'))
									<span class="help-block">
										<strong>{{ $errors->first('first_name') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group col-md-6{{ $errors->has('last_name') ? ' has-error' : '' }}">
								<label for="last_name" class="control-label sr-only">Last Name</label>
								<input id="last_name" type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required>
								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('last_name') }}</strong>
									</span>
								@endif
							</div>
						</div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label sr-only">E-Mail Address</label>
							<input id="email" type="email" class="form-control" placeholder="E-Mail Address" name="email" value="{{ old('email') }}" required>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label sr-only">Password</label>
							<input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label sr-only">Confirm Password</label>
							<input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    Register
                                </button>
                            </div>
                        </div>
						<div class="row">
							<div class="col-xs-12">
								<div class="social-auth-links text-center">
								  <p>- OR -</p>
								  <a href="{{ url('/register/facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
									Facebook</a>
								  <a href="{{ url('/register/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
									Google+</a>
								</div>
								<!-- /.social-auth-links -->
							</div>
						</div>
					</form>
					<hr class="divider divider-small" />
					<div class="row">
						<div class="col-xs-7 text-right pad-top-sm">
							Already Have An Account?
						</div>
						<div class="col-xs-5">
							<a class="btn btn-primary btn-block btn-flat" href="{{ url('/login') }}">
								Login Now
							</a>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
