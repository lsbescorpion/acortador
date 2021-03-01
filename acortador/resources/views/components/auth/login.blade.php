<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('assets/css/material-kit.min.css?v=2.2.0')}}" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
	@include('components.partials.navbar')
	<div class="page-header header-filter" style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
	    <div class="container">
	      	<div class="row">
		        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
		          	<form class="form" method="POST" action="{{action('AuthController@Login')}}" id="form_login">
		          	@csrf
		            	<div class="card card-login card-hidden">
			              	<div class="card-header card-header-primary text-center">
			                	<h4 class="card-title">Login</h4>
			              	</div>
			              	<div class="card-body ">
			                	<span class="bmd-form-group">
				                  	<div class="input-group">
				                    	<div class="input-group-prepend">
				                      		<span class="input-group-text">
				                        		<i class="material-icons">email</i>
				                      		</span>
				                    	</div>
				                    	<input type="email" id="email" name="email" class="form-control" placeholder="Email..." required>
				                  	</div>
			                	</span>
			                	<span class="bmd-form-group">
				                  	<div class="input-group">
				                    	<div class="input-group-prepend">
					                      	<span class="input-group-text">
					                        	<i class="material-icons">lock_outline</i>
					                      	</span>
				                    	</div>
				                    	<input type="password" id="password" name="password" class="form-control" placeholder="Password..." required>
				                  	</div>
					                @if($errors->has('password'))
			                        <div id="password-error" class="error text-danger pl-3" for="email" style="display: block;">
			                        	<strong>{{ $errors->first('password') }}</strong>
					                </div>
			                        @endif
					                @if($errors->has('locked'))
			                            <div id="clock" style="width: 100%;margin-top: 0.25rem;font-size: 14px;color: #F64E60;">
			                            </div>
			                        @endif
				                </span>
			              	</div>
	              			<div class="card-footer justify-content-center">
	                			<button id="btn-submit" type="submit" class="btn btn-rose btn-link btn-lg">Acceder</button>
	              			</div>
	            		</div>
	          		</form>
	        	</div>
	      	</div>
	    </div>
	    @include('components.partials.footer')
	</div>
  <!--   Core JS Files   -->
  	<script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
      <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
      <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{asset('assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
      <!--  Google Maps Plugin    -->
      <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/material-kit.min.js?v=2.2.0')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.countdown.js')}}"></script>
    @if ($errors->has('locked'))
    <script type="text/javascript">
        var fiveSeconds = new Date().getTime() + 60000;
        $('#clock').countdown(fiveSeconds, function(event) {
            $(this).html("Muchos intentos, el login ha sido desabilitado por "+event.strftime('%S')+" segundos. Por favor intente mas tarde o considere cambiar su contraseña");
            $('#btn-submit').attr('disabled', true);
        }).on('finish.countdown', function(event) {
            $(this).html('');
            $('#btn-submit').attr('disabled', false);
        });
    </script>
    @endif
</body>

</html>