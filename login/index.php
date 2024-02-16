<?php

	session_start();
	if (isset($_SESSION['S_IDUSR'])){
		header('Location: ../vista/index.php');
	}

?>
<!doctype html>
<html lang="en">

<head>
	<title>Login 07</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">INICIAR SESION</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Bienvenido al Sistema de Mantenimiento por parte del Centro de Computo</h2>
							</div>
						</div>
						<div class="login-wrap p-4 p-lg-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Iniciar Sesión</h3>
								</div>
							</div>
							<div class="signin-form">
								<div class="form-group mb-3">
									<label class="label">Usuario</label>
									<input type="text" class="form-control" placeholder="Username" id="usr_txt">
								</div>
								<div class="form-group mb-3">
									<label class="label">Contraseña</label>
									<input type="password" class="form-control" placeholder="Password" id="passwd_txt">
								</div>
								<div class="form-group">
									<button class="form-control btn btn-primary submit px-3"
										onclick="verificarUsr()">Iniciar
										Sesión</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Recuérdame
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">¿Olvidó la contraseña?</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="sweetalert2/sweetalert211.js"></script>
	<script src="../js/usuario.js"></script>

</body>
<script>
	usr_txt.focus();
</script>

</html>