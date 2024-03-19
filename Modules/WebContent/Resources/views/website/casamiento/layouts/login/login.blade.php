<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>

        @section('htmlheader')
	        @include('layouts.theme-admin.volgh.htmlheader')
        @show


        {!!Html::style('theme-admin/volgh/assets/plugins/single-page/css/main.css')!!}


    </head>

    <body class="login-img">




        @include('flash::message')

        		<!-- BACKGROUND-IMAGE -->
		<div class="login-img" style="background-image: url('{{ asset('theme-admin/volgh/assets/img/login/background.jpg') }}'); background-size: cover; background-position: center; width: 100vw; height: 100vh;">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="{{asset('theme-admin/volgh/assets/img/loading.svg')}}" class="loader-img" alt="Loader">
			</div>
			<!-- /GLOABAL LOADER -->

			<!-- PAGE -->
			<div class="page">
				<div class="">
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto">
						<div class="text-center">
							<img src="assets\img\brand\logo.png" class="header-brand-img')}} >
						</div>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-6">
							<form class="login100-form validate-form" method="POST" action="{{ route('login.store') }}">
                                {{ csrf_field() }}
								<span class="login100-form-title">
									Login
								</span>
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
								<div class="text-right pt-1">
									<p class="mb-0"><a href="forgot-password.html" class="text-primary ml-1">Forgot Password?</a></p>
								</div>
								<div class="container-login100-form-btn">

                                    <button type="submit" class="login100-form-btn btn-primary">Login</button>
								</div>
								<div class="text-center pt-3">
									<p class="text-dark mb-0">Not a member?<a href="register.html" class="text-primary ml-1">Sign UP now</a></p>
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
			<!-- End PAGE -->

		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

        <!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>


@section('scripts')
            @include('layouts.theme-admin.volgh.scripts')
        @show


    </body>
</html>
