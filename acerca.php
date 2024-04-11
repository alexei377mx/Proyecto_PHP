<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="es">

<!-- encabezado -->

<head>
    <title>Sneakersun - Acerca de</title>
    <link rel="shortcut icon" href="img\sneackersun-logo-no-background.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Enlace a la hoja de estilos personalizada -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<style>
    html {
        scroll-behavior: smooth;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }



    a {
        text-decoration: none;
        outline: none;
    }

    a:hover {
        text-decoration: underline;
    }





    /* * ============================== */
    /* * ============ MAIN ============ */
    /* * ============================== */

    main {
        min-height: 100vh;
    }

    main .contenido p {
        margin-bottom: 20px;
        line-height: 30px;
        color: #525151;
    }

    main .container .titulo {
        padding-top: 90px;
    }

    main .contenido .fecha {
        font-size: 14px;
        color: #B5B5B5;
    }

    /* * ============================== */
    /* * ============ ASIDE =========== */
    /* * ============================== */

    aside {
        min-width: 30%;
        margin: 40px 20px 20px 0;
        height: 100%;
        background: #1D2F3D;
        padding: 20px;
        border-radius: 3px;
        position: sticky;
        top: 100px;
    }

    aside .titulo {
        font-family: 'Montserrat', sans-serif;
        font-weight: normal;
        font-size: 24px;
        margin-bottom: 20px;
        color: #f2f2f2;
    }

    aside .indice a {
        display: block;
        margin-bottom: 10px;
        color: #FFCD48;
    }

    /* * ============================== */
    /* * ========== FOOTER ============ */
    /* * ============================== */



    /* * ============================== */
    /* * ====== MEDIA QUERIES ========= */
    /* * ============================== */
    @media screen and (max-width: 900px) {
        .navbar .contenedor {
            flex-wrap: wrap;
            margin: 0;
            width: 100%;
        }

        .navbar a {
            width: auto;
            flex: 1;
        }

        .contenedor-imagen {
            height: 50vh;
        }

        main .contenedor {
            flex-direction: column;
        }
    }
</style>

<body>
    <!-- barra de navegacion -->
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="margin-bottom: 20px; background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px);">
			<a class="navbar-brand" href="index.php">
				<a class="navbar-brand" href="index.php" style="color: #ffffffce;">
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
							<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

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

						<!-- Menú desplegable -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Cuenta
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: rgba(0, 0, 0, 0.25); backdrop-filter: blur(5px);">
								<a class="nav-link" style="color: #9b9b9b;" href="viewCart.php">Carrito</a>
								<a class="nav-link" style="color: #9b9b9b;" href="reset-password.php">Cambiar<br>Contraseña</a>
								<a class="nav-link" style="color: #9b9b9b;" href="logout.php">Cerrar<br>Sesión</a>
							</div>
						</li>
						</form>
						</li>
					</ul>
				</div>
		</nav>
	</header>

    <main id="blog" style="margin-top: 0px;">
        <div class="container fade-in" style=" max-width: 1000px; width: 90%; margin: auto; display: flex; justify-content: space-between;">

            <aside style="background-color: rgba(255, 255, 255, 0.05); margin-top: 0px; margin-bottom: 20px;">
                <h3 style="color: #ffffffce;">Acerca de nosotros</h3>
                <nav class="indice">
                    <a href="#articulo-1">Nuestra historia</a>
                    <a href="#articulo-2">Identidad</a>
                    <a href="#articulo-3">Legal</a>
                </nav>
            </aside>
            <div class="container fade-in" style="background-color: rgba(255, 255, 255, 0.05); margin-top: 0px; margin-bottom: 20px;">
                <div class="post">
                    <h1 class="titulo" id="articulo-1" style="color: #ffffffce;  text-align: center;">Nuestra historia</h1>
                    <p style="color: #ffffffce;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                        euismod scelerisque erat tincidunt hendrerit. Cras lobortis id
                        diam sit amet consectetur. Suspendisse non pulvinar justo, ac
                        commodo velit. Quisque maximus dolor ac magna molestie, sit amet
                        commodo velit congue. Maecenas non dolor ut elit malesuada congue.
                        Phasellus euismod nisi pharetra ante rutrum dignissim. Ut eget
                        tortor ut sapien egestas sollicitudin. Aenean pulvinar varius
                        augue, ac euismod tortor faucibus at. In commodo sodales turpis
                        nec vehicula. Mauris luctus, risus non iaculis porttitor, felis
                        eros sagittis enim, sed ultricies lacus magna quis urna.
                    </p>
                </div>
                <div class="post">
                    <h1 class="titulo" id="articulo-2" style="color: #ffffffce; text-align: center;">Identidad</h1>
                    <p style="color: #ffffffce;">
                        Ut sit amet vehicula lectus, nec vestibulum purus. Nulla a nibh
                        magna. Pellentesque commodo commodo sapien eu sagittis. Aenean
                        luctus mauris sit amet quam ornare, eu ultricies nunc auctor.
                        Nulla volutpat purus eu venenatis facilisis. Nulla risus nisl,
                        rhoncus vitae pulvinar nec, viverra eu odio. Duis nisi quam,
                        gravida sed imperdiet sed, viverra fermentum turpis. Cras non
                        iaculis augue, nec scelerisque nibh. Sed auctor dolor mi, sit amet
                        placerat tellus sagittis eu. Curabitur nec luctus dolor. Ut congue
                        rutrum vehicula. Ut viverra tincidunt nunc, vitae cursus nulla
                        scelerisque aliquam.
                    </p>
                </div>
                <div class="post">
                    <h1 class="titulo" id="articulo-3" style="color: #ffffffce; text-align: center;">Legal</h1>
                    <p style="color: #ffffffce;">
                        Aliquam congue nibh in urna porta blandit. Mauris nec mi elit.
                        Duis ligula quam, suscipit nec hendrerit ac, efficitur pulvinar
                        tortor. Quisque venenatis leo ac hendrerit molestie. Quisque
                        malesuada, enim ut feugiat finibus, sem mi faucibus enim, vel
                        rhoncus ante justo in nibh. Duis sit amet ipsum tempus,
                        pellentesque ex sed, mollis erat. Sed metus nibh, tincidunt vel
                        laoreet eget, bibendum at est.
                    </p>
                </div>
            </div>
        </div>
    </main>

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
<script src="script.js"></script>

</html>