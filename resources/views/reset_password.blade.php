<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>RecruiterLabs</title>

	<!-- Global stylesheets -->
	<link href="{{asset('assets/fonts/inter/inter.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/icons/phosphor/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/ltr/all.min.css')}}" id="stylesheet" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('assets/demo/demo_configurator.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
	<!-- /core JS files -->

	
	<script src="{{asset('assets/js/app.js')}}"></script>
	

</head>

<body>
    <!-- Main navbar -->
	<div class="navbar navbar-dark navbar-static py-2">
		<div class="container-fluid">
			<div class="navbar-brand">
				<a href="index.html" class="d-inline-flex align-items-center">
					<img src="{{asset('assets/images/logo_icon.svg')}}" alt="">
					<img src="{{asset('assets/images/logo_text_light.svg')}}" class="d-none d-sm-inline-block h-16px ms-3" alt="">
				</a>
			</div>

			<div class="d-flex justify-content-end align-items-center ms-auto">
				<ul class="navbar-nav flex-row">
					{{-- <li class="nav-item">
						<a href="#" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
							<div class="d-flex align-items-center mx-md-1">
							<i class="ph-lifebuoy"></i>
							<span class="d-none d-md-inline-block ms-2">Support</span>
						</div>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
							<div class="d-flex align-items-center mx-md-1">
							<i class="ph-user-circle-plus"></i>
							<span class="d-none d-md-inline-block ms-2">Register</span>
						</div>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
							<div class="d-flex align-items-center mx-md-1">
							<i class="ph-user-circle"></i>
							<span class="d-none d-md-inline-block ms-2">Login</span>
						</div>
						</a>
					</li> --}}
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->
    <div class="page-content">
        
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">
                        <form method="POST" action="{{ route('change.password') }}">
                            @csrf
                                @if(isset($email))
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="text-center mb-3">
                                                <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                                    <img src="{{asset('assets/images/logo_icon.svg') }}" class="h-48px" alt="">
                                                </div>
                                                <h5 class="mb-0">Login to your account</h5>
                                                <span class="d-block text-muted">Enter your credentials below</span>
                                            </div>
            
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <div class="form-control-feedback form-control-feedback-start">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email }}" required readonly autofocus>
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-user-circle text-muted"></i>
                                                    </div>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>
            
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <div class="form-control-feedback form-control-feedback-start">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-lock text-muted"></i>
                                                    </div>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Confirm password</label>
                                                <div class="form-control-feedback form-control-feedback-start">
                                                    <input id="password_confirmation" type="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required >
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-lock text-muted"></i>
                                                    </div>
                                                    @error('password_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
            
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                            </div>
            
                                            {{-- <div class="text-center">
                                                <a href="login_password_recover.html">Forgot password?</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                @else
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="text-center mb-3">
                                                <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                                    <img src="{{asset('assets/images/logo_icon.svg') }}" class="h-48px" alt="">
                                                </div>
                                                <h5 class="mb-0">Login to your account</h5>
                                                <div class="mb-3">
                                                    <div class="mt-3 alert alert-danger">Invalid Token</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif 
                        </form>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
    </div>
    </body>
</html>