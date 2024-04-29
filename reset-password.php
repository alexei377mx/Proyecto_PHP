<?php
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file
require_once "dbConfig.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Por favor ingresa la nueva contraseña";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "La contraseña debe de tener al menos 6 caracteres";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Por favor confirma la contraseña";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Las contraseñas no son iguales";
        }
    }

    // Check input errors before updating the database
    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare an update statement
        $sql = "UPDATE customers SET password = ? WHERE id = ?";

        if ($stmt = $db->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else {
                echo "¡Huy!, algo salió mal, por favor inténtalo de nuevo mas tarde";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $db->close();
}
?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="es">

<!-- encabezado -->

<head>
    <title>Sneakersun - Cambiar contraseña</title>
    <link rel="shortcut icon" href="img\sneackersun-logo-no-background.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Enlace a la hoja de estilos personalizada -->
    <link rel="stylesheet" type="text/css" href="styleLoginRegister.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
   <!-- Barra de navegación -->
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="margin-bottom: 20px; background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px);">
			<a class="navbar-brand" href="index.php">
				<img src="img\sneackersun-logo-no-background.png" alt="Sneakersun Logo" width="50" height="50">
				Sneakersun SA de CV
			</a>
			<p class="sneakersun-paragraph" style="color: #9b9b9b;">¡Pisa con estilo, camina con confianza,<br> descubre tu paso perfecto con Sneackersun!</p>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<!-- Formulario de búsqueda -->
						<form class="form-inline my-2 my-lg-0" action="resultados_busqueda.php" method="GET">
							<div class="input-group">
								<!-- buscador -->
								<input class="form-control mr-sm-2" type="search" placeholder="Buscar calzado" aria-label="Buscar" name="search" style="color: #ffffffce; width: 50%; background-color: transparent; border-color: rgba(129, 129, 129, 0.5)">
								<div class="input-group-append">
									<button class="btn btn-outline-success" type="submit" id="button-addon2">
										<i class="bi bi-search"></i> <!-- Icono de lupa de Bootstrap Icons -->
									</button>
								</div>
							</div>
						</form>
						<!-- Script para enviar el formulario al hacer clic en el icono de lupa -->
						<script>
							// Agregar un evento de clic al icono de lupa para enviar el formulario
							document.getElementById('button-addon2').addEventListener('click', function(event) {
								event.preventDefault(); // Evitar que el formulario se envíe automáticamente
								document.querySelector('form').submit(); // Enviar el formulario
							});
						</script>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="productos.php">Productos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="acerca.php">Acerca de</a>
					</li>
					<li>
						<a class="nav-link" href="viewCart.php">Mi Carrito</a>
					</li>

					<!-- Menú desplegable -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Cuenta
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: rgba(0, 0, 0, 0.25); backdrop-filter: blur(5px);">
							<a class="nav-link" style="color: #9b9b9b;" href="orders.php">Mis<br>compras</a>
							<a class="nav-link" style="color: #9b9b9b;" href="reset-password.php">Cambiar<br>Contraseña</a>
							<a class="nav-link" style="color: #9b9b9b;" href="logout.php">Cerrar<br>Sesión</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</header>


    <body>
        <div class="wrapper fade-in" class="container fade-in" style="margin-top: 90px; background-color: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px);">
            <h2 style="color: #ffffffce; text-align: center;">Cambiar contraseña</h2>
            <p style="color: #ffffffce">Por favor llena el formulario para modificar tu contraseña</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label style="color: #ffffffce; text-align: center;">Nueva contraseña</label>
                    <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                    <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
                </div>
                <div class="form-group">
                    <label style="color: #ffffffce; text-align: center;">Confirmar Contraseña</label>
                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input style="background-color: purple; color: #ffffffce; border: none;" type="submit" class="btn btn-primary" value="Cambiar">
                    <a class="btn btn-link ml-2" href="index.php">Cancelar</a>
                </div>
            </form>
        </div>
    </body>

</html>