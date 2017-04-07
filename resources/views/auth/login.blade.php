@extends('layouts.app')

@section('content')
<div class="container login-container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <h2 class="text-center">Login</h2>
                <div class="panel-body">
                    <form class="" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label sr-only">E-Mail Address</label>
							<input id="email" type="email" class="form-control" name="email" placeholder="Enter E-mail Address" value="{{ old('email') }}" required autofocus>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label sr-only">Password</label>
							<input id="password" type="password" class="form-control" placeholder="Enter Password" name="password" required>
							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
                        </div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-8">
								  <div class="checkbox">
									<label>
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
									</label>
								  </div>
								</div>
								<div class="col-xs-4">
									<button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Login</button>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="social-auth-links text-center">
						  <p>- OR -</p>
						  <a href="{{ url('/login/facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
							Facebook</a>
						  <a href="{{ url('/login/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
							Google+</a>
						</div>
						<!-- /.social-auth-links -->
                    </form>
					<div class="">
						<a class="btn btn-link" href="{{ url('/password/reset') }}">
							Forgot Your Password?
						</a>
						<hr />
						<div class="row">
							<div class="col-xs-7 text-right pad-top-sm">
								Want To Get Started?
							</div>
							<div class="col-xs-5">
								<a class="btn btn-primary btn-block btn-flat" href="{{ url('/register') }}">
									Register Now
								</a>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
