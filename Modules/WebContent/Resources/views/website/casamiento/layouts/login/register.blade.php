<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Volgh –  Bootstrap 4 Responsive Application Admin panel Theme Ui Kit & Premium Dashboard Design Modern Flat Laravel Template">
        <meta name="author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="dashboard, admin, dashboard template, admin template, laravel, php laravel, laravel bootstrap, laravel admin template, bootstrap laravel, bootstrap in laravel, laravel dashboard template, laravel admin, laravel dashboard, laravel blade template, php admin">

        <!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="assets\img\brand\favicon.ico">

		<!-- TITLE -->
		<title>Volgh –  Bootstrap 4 Responsive Application Admin panel Theme Ui Kit & Premium Dashboard Design Modern Flat HTML Template</title>

    @section('htmlheader')
        @include('layouts.theme-admin.volgh.htmlheader')
    @show


    {!!Html::style('theme-admin/volgh/assets/plugins/single-page/css/main.css')!!}




    </head>

    <body class="login-img">




        @include('flash::message')


        		<!-- BACKGROUND-IMAGE -->
		<div class="login-img">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="assets\img\loader.svg" class="loader-img" alt="Loader">
			</div>
			<!-- /GLOABAL LOADER -->

			<!-- PAGE -->
			<div class="page">
				<div class="">
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto">
						<div class="text-center">
							<img src="assets\img\brand\logo.png" class="header-brand-img" alt="logo">
						</div>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-6">
							<form class="login100-form validate-form" method="POST" action="{{ route('register.store') }}">
								{{ csrf_field() }}
								<span class="login100-form-title">
									Registration
								</span>
								<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
									<input class="input100" type="text" name="name" placeholder="User name">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="mdi mdi-account" aria-hidden="true"></i>
									</span>
								</div>
								<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
									<input class="input100" type="text" name="email" placeholder="Email">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>
								</div>
								<div class="wrap-input100 validate-input" data-validate="Password is required">
									<input class="input100" type="password" name="password" placeholder="Password">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
								</div>
								<div class="wrap-input100 validate-input" data-validate="Password is required">
									<input class="input100" type="password" name="password_confirmation" placeholder="Retype password">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
								</div>

								<label class="custom-control custom-checkbox mt-4">
									<input type="checkbox" class="custom-control-input">
									<span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
								</label>
								<div class="container-login100-form-btn">
									<button type="submit" class="login100-form-btn btn-primary">Register</button>
								</div>
								<div class="text-center pt-3">
									<p class="text-dark mb-0">Already have account?<a href="login.html" class="text-primary ml-1">Sign In</a></p>
								</div>
								<div class=" flex-c-m text-center mt-3">
								    <p>Or</p>
									<div class="social-icons">
										<ul>
											<li><a class="btn  btn-social btn-block"><i class="fa fa-google-plus text-google-plus"></i> Sign up with Google</a></li>
											<li><a class="btn  btn-social btn-block mt-2"><i class="fa fa-facebook text-facebook"></i> Sign in with Facebook</a></li>
										</ul>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
			<!-- END PAGE -->

		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

        <!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>


    @section('scripts')
        @include('layouts.theme-admin.volgh.scripts')
    @show

    </body>
</html>
