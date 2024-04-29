<?php include_once "header.php"; ?>
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
    <title>Productos - Sneakersun</title>
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

    <!-- productos -->
    <div class="container fade-in" style="margin-top: 100px; background-color: rgba(255, 255, 255, 0.05);">
        <h1 style="color: #ffffffce; text-align: center;">Conoce nuestro catálogo:</h1>
        <a href="viewCart.php" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
        <div id="products" class="row">
            <?php
            $query = $db->query("SELECT * FROM products ORDER BY RAND()");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
            ?>
                    <div class="col-lg-4">
                        <div class="card" id="cardProducts">
                            <div style="flex: 1;">
                                <h5 class="card-title" style="text-align: center;"><br>
                                    <?php echo $row["name"]; ?></h5>
                                <p class="card-text" style="text-align: center;"><?php echo $row["description"]; ?></p>
                            </div>
                            <div style="flex: 1;">
                                <img src="<?php echo $row["URLimg"]; ?>" alt="Product Image" style="height: 200px; width: auto;">
                            </div>
                            <div style="flex: 1;">
                                <p class="lead"><?php echo '$' . $row["price"] . ' MXN'; ?></p>
                                <a class="btn btn-success" style="background-color: #d56e00; color: #ffffffce; border: none;" onclick="addToCart(<?php echo $row["id"]; ?>)">Agrega al Carrito</a>
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Incluir la biblioteca SweetAlert2 -->

                                <script>
                                    function addToCart(productId) {
                                        // Crea un objeto XMLHttpRequest
                                        var xhttp = new XMLHttpRequest();

                                        // Define la función de respuesta para la solicitud AJAX
                                        xhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                // Muestra la notificación utilizando SweetAlert2
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: '¡Producto agregado!',
                                                    text: 'El producto ha sido agregado al carrito.',
                                                    showConfirmButton: false,
                                                    timer: 1200 // Duración de la notificación en milisegundos
                                                });
                                            }
                                        };

                                        // Abre una conexión y envía la solicitud al servidor
                                        xhttp.open("GET", "cartAction.php?action=addToCart&id=" + productId, true);
                                        xhttp.send();
                                    }
                                </script>

                            </div>
                        </div>

                    </div>
                <?php }
            } else { ?>
                <p>Producto(s) no encontrados.....</p>
            <?php } ?>
        </div>
    </div>

    <!-- contacto -->
    <footer>
        <span class="half-br"></span>
        <div class="container fade-in" style="margin-bottom: 20px; background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(20px);">
            <div class="row">
                <div class="col-md-6">
                    <h4 style="color: #ffffffce;">Sneakersun SA de CV</h4>
                    <p>Sneakersun SA de CV es una empresa dedicada a la venta de calzado.</p>
                </div>
                <div class="col-md-6">
                    <h4 style="color: #ffffffce;">Contacto</h4>
                    <ul class="list-unstyled" style="color: gray">
                        <li><i class="fas fa-map-marker-alt"></i> Av. Tecnológico #123, Col. Centro, Ciudad de México</li>
                        <li><i class="fas fa-phone"></i> +52 55 2411 1229</li>
                        <li><i class="fas fa-envelope"></i> info@sneakersun.com.mx</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h5 style="color: #ffffffce;">Políticas de privacidad</h5>
                    <p>Respetamos la privacidad de nuestros clientes y nos comprometemos a proteger sus datos personales. Utilizamos la información que nos proporciona solo para procesar su pedido y mejorar su experiencia de compra. Nunca compartiremos su información con terceros sin su consentimiento previo.</p>
                </div>
                <div class="col-md-6">
                    <h5 style="color: #ffffffce;">Redes sociales</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i> YouTube</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>