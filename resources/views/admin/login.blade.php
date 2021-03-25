<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Login | DAT-DROP</title>
		<meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- Toggles CSS -->
		<link href="../vendors4/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
		<link href="../vendors4/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
		
		<!-- Custom CSS -->
		<link href="{{URL::to('/')}}/dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		
		
		<!-- HK Wrapper -->
		<div class="hk-wrapper">
			
			<!-- Main Content -->
			<div class="hk-pg-wrapper hk-auth-wrapper">
				<header class="d-flex justify-content-end align-items-center">
					<div class="btn-group btn-group-sm">
					</div>
				</header>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 pa-0">
							<div class="auth-form-wrap pt-xl-0 pt-70">
								<div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
									<a class="auth-brand text-center d-block mb-20" href="#">
										DAT-DROP <small>(Administration)</small>
									</a>
									<form method="post" action="{{ URL::to('/admin/login') }}">
										{{ csrf_field() }}
										<h1 class="display-4 text-center mb-10">Welcome :)</h1>

										@if (session()->has('error'))
											<div class="alert alert-danger" role="alert">
		                                        <strong>Alert.! </strong> &nbsp;{{session()->get('error')}}
		                                    </div>
										@endif
										
										<div class="form-group">
											<input class="form-control" name="username" placeholder="Username" type="text" required>
										</div>
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" name="password" placeholder="Password" type="password" required>
												<div class="input-group-append">
													<span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
												</div>
											</div>
										</div>
										<button class="btn btn-primary btn-block" type="submit">Login</button>
										<a href="{{URL::to('/')}}" class="btn btn-default btn-block">Cancel</a>
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /HK Wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="/vendors4/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="/vendors4/popper.js/dist/umd/popper.min.js"></script>
		<script src="/vendors4/bootstrap/dist/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="dist/js/dropdown-bootstrap-extended.js"></script>
		
		<!-- FeatherIcons JavaScript -->
		<script src="dist/js/feather.min.js"></script>

		<!-- Toastr JS -->
    	<script src="/vendors4/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
		
		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>

	</body>
</html>