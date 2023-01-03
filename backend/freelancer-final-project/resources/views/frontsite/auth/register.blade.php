@extends('frontsite.master')
@section('content')
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Register</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Register</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xl-5 offset-xl-3">
<!-- Validation Errors -->
			
			<div class="login-register-page">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3 style="font-size: 26px;">Let's create your account!</h3>
					<span>Already have an account? <a href="pages-login.html">Log In!</a></span>
				</div>
				<!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->
				<!-- Form -->
				<form method="post" id="register-account-form" action="{{ route('register') }}">
					@csrf
					<!-- Account Type -->
					<div class="account-type">
						<div>
							<input type="radio" name="type" id="freelancer-radio" class="account-type-radio" checked="" value="freelancer">
							<label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Freelancer</label>
						</div>

						<div>
							<input type="radio" name="type" id="employer-radio" class="account-type-radio" value="client">
							<label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Employer</label>
						</div>
					</div>
					<div class="input-with-icon-left">
						<i class="icon-material-outline-account-circle"></i>
						<input type="text" class="input-text with-border" name="name" id="name" placeholder="Name" value="{{old('name')}}" required="">
						@error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
					</div>
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="email" class="input-text with-border" name="email" id="email" placeholder="Email Address" value="{{old('email')}}" required="">
						@error('email')
                                    <p class="invalid-feedback text-red-600">{{ $message }}</p>
                                    @enderror
					</div>

					<div class="input-with-icon-left" data-tippy-placement="bottom" data-tippy="" data-original-title="Should be at least 8 characters long">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required="" value="{{old('password')}}">
						@error('password')
                                    <p class="invalid-feedback text-red-600">{{ $message }}</p>
                                    @enderror
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password_confirmation" id="password_confirmation" placeholder="Repeat Password" value="{{old('password_confirmation')}}" required="">
						@error('password_confirmation')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
					</div>
				
					<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit">Register <i class="icon-material-outline-arrow-right-alt"></i></button>

				</form>

				<!-- Button -->

				<!-- Social Login -->
				<div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Register via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Register via Google+</button>
				</div>
			</div>

		</div>
	</div>
</div>
<div class="margin-top-70"></div>
@endsection