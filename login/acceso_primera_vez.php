<?php

	session_start();
	/**if(isset($_SESSION['sesion_correo_usuario']))
	{
		header('Location: ../vista/index.php');
	}**/

?>


<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="../Plantilla/octopus/octopus/assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="../Plantilla/octopus/octopus/assets/images/logo.png" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>Acceso por primera vez al sistema</h2>
					</div>
					<div class="panel-body">
                        <h4 style="text-align: center;"><?php echo $_SESSION['sesion_nombres_usuario'] ?> debe cambiar la contraseña</h4><br>
						<input type="hidden" id="id_usuario" value="<?php echo $_SESSION['sesion_id_usuario'] ?>">
                        <form autocomplete="FALSE" onsubmit="return false" action="">
							<div class="form-group mb-lg">
								<label>Correo Electrónico</label>
								<div class="input-group input-group-icon">
									<input name="correo_usuario" id="correo_usuario" type="mail" value="<?php echo $_SESSION['sesion_correo_usuario'] ?>" disabled=true class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Contraseña Nueva</label>
								</div>
								<div class="input-group input-group-icon">
									<input id="contraseña_usuario_nueva" name="contraseña_usuario_nueva" type="password" placeholder="Ingrese su contraseña" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

                            <div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Repetir contraseña</label>
								</div>
								<div class="input-group input-group-icon">
									<input id="contraseña_usuario_repetir" name="contraseña_usuario_repetir" type="password" placeholder="Ingrese su contraseña" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>G10</span>
							</span>

							<div class="mb-xs text-center">
								<button class="btn btn-facebook mb-md ml-xs mr-xs" onclick="AccesoPrimeraVez();"><i class="fa fa-check"></i>&nbsp;Cambiar contraseña</button>
								<!--<a class="btn btn-facebook mb-md ml-xs mr-xs">Ingresar <i class="fa fa-check"></i></a>-->
							</div>
						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Desarrollado por: Stalin Crisanto, Dany Lasso, Xavier Vaca .</p>
			</div>
		</section>
		<!-- end: page -->

		<script src="../js/login/login.js?newversion"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

		<!-- Vendor -->
		<script src="../Plantilla/octopus/octopus/assets/vendor/jquery/jquery.js"></script>
		<script src="../Plantilla/octopus/octopus/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../Plantilla/octopus/octopus/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../Plantilla/octopus/octopus/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../Plantilla/octopus/octopus/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../Plantilla/octopus/octopus/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="../Plantilla/octopus/octopus/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="../Plantilla/octopus/octopus/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="../Plantilla/octopus/octopus/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="../Plantilla/octopus/octopus/assets/javascripts/theme.init.js"></script>

	</body><img src="http://www.ten28.com/fref.jpg">

	<script>
		
	</script>

</html>