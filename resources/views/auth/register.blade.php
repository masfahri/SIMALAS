<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.multipurposethemes.com/admin/eduadmin-template/main/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Dec 2020 10:34:34 GMT -->
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://www.multipurposethemes.com/admin/eduadmin-template/images/favicon.ico">

    <title>EduAdmin - Log in </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('v1/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('v1/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('v1/css/skin_color.css') }}">	
</head>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url({{ asset('v1/images/auth-bg/bg-1.jpg') }})">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded30 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Let's Get Started</h2>
								<p class="mb-0">Sign in to continue to WebkitX.</p>							
							</div>
							<div class="p-40">
								<form action="{{ route('login.store') }}" method="post">
									@csrf
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent" {{ $errors->has('username') ? 'style=color:red;' : '' }}><i class="ti-user"></i></span>
											</div>
											<input type="text" name="username" class="form-control pl-15 bg-transparent" placeholder="Username">
										</div>
										@if ($errors->has('username'))
											<span class="text-danger">{{ $errors->first('username') }}</span>
										@endif
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text  bg-transparent" {{ $errors->has('password') ? 'style=color:red;' : '' }}><i class="ti-lock"></i></span>
											</div>
											<input type="password" name="password" class="form-control pl-15 bg-transparent" placeholder="Password">
										</div>
										@if ($errors->has('password'))
											<span class="text-danger">{{ $errors->first('password') }}</span>
										@endif
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-right">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-danger mt-10">SIGN IN</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>	
								<div class="text-center">
									<p class="mt-15 mb-0">Don't have an account? <a href="auth_register.html" class="text-warning ml-5">Sign Up</a></p>
								</div>	
							</div>						
						</div>
						<div class="text-center">
						  <p class="mt-20 text-white">- Sign With -</p>
						  <p class="gap-items-2 mb-20">
							  <a class="btn btn-social-icon btn-round btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
							  <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
							  <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
							</p>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{ asset('v1/js/vendors.min.js') }}"></script>
	<script src="{{ asset('v1/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('v1/icons/feather-icons/feather.min.js') }}"></script>	

</body>

<!-- Mirrored from www.multipurposethemes.com/admin/eduadmin-template/main/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Dec 2020 10:34:34 GMT -->
</html>
