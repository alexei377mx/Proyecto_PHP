<?php
// Mandamos llamar nuestra BD
include 'dbConfig.php';
?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">


<!DOCTYPE html>
<html lang="es">


<head>
    <title>Sneakersun SA de CV</title>
    <link rel="shortcut icon" href="img\sneackersun-logo-no-background.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Enlace a la hoja de estilos personalizada -->
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

    <div class="container fade-in" style="margin-top: -10px; background-color: rgba(255, 255, 255, 0.25);">
        <?php
        // Verificar si se ha enviado un término de búsqueda
        if (isset($_GET['search'])) {
            // Obtener el término de búsqueda desde la URL
            $searchTerm = $_GET['search'];

            // Consultar la base de datos buscando cualquier coincidencia en algún campo
            $query = "SELECT * FROM products WHERE name LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'";
            $resultado = mysqli_query($db, $query);

            // Verificar si se encontraron resultados
            if (mysqli_num_rows($resultado) > 0) {
                echo '<br><br><br> <h1 style="color: white">Resultados de la búsqueda</h1>';
                echo '<div id="products" class="row">';
                // Mostrar los resultados
                while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
                    <div class="col-lg-4">
                        <div class="card" style="margin: 3px; display: flex; flex-direction: column; height: 450px; align-items: center; background-color: rgba(255, 255, 255, 0.75);">
                            <div style="flex: 1;">
                                <h5 class="card-title" style="text-align: center;"><br><?php echo $row["name"]; ?></h5>
                                <p class="card-text" style="text-align: center;"><?php echo $row["description"]; ?></p>
                            </div>
                            <div style="flex: 1;">
                                <img src="<?php echo $row["URLimg"]; ?>" alt="Product Image" style="height: 200px; width: auto;">
                            </div>
                            <div style="flex: 1;">
                                <p class="lead"><?php echo '$' . $row["price"] . ' MXN'; ?></p>
                                <a class="btn btn-success" style="background-color: #d56e00; color: #ffffffce; border: none;" onclick="addToCart(<?php echo $row["id"]; ?>)">Agrega al Carrito</a>
                            </div>
                        </div>
                    </div>
        <?php }
                echo '</div>';
            } else {
                echo "<br><br><br><br> <h1 style='color: white;'>No se encontraron resultados para la búsqueda: $searchTerm</h1>";
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($db);
        } else {
            // Si no se ha enviado un término de búsqueda, redirigir al usuario a otra página
            header("Location: index.php");
            exit(); // Asegurarse de que el script se detenga aquí
        }
        ?>
        <a class="btn btn-success" href="productos.php" style="background-color: purple; color: #ffffffce; border: none;">Ve nuestro catálogo completo</a>
    </div>
</body>