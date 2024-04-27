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

    <main id="blog" style="margin-top: 0px;">
        <div class="container fade-in" style=" max-width: 1000px; width: 90%; margin: auto; display: flex; justify-content: space-between;">

            <aside style="background-color: rgba(255, 255, 255, 0.05); margin-top: 0px; margin-bottom: 20px;">
                <h3 style="color: #ffffffce;">Acerca de nosotros</h3>
                <nav class="indice">
                    <a href="#articulo-1">Nuestra historia</a>
                    <a href="#articulo-2">Identidad</a>
                    <a href="#articulo-3">Legal</a>
                    <a href="#articulo-4">Métodos de pago</a>
                </nav>
            </aside>
            <div class="container fade-in" style="background-color: rgba(255, 255, 255, 0.05); margin-top: 0px; margin-bottom: 20px;">
                <div class="post"> <!-- nuestra historia -->
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

                <div class="post"> <!-- identidad -->
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

                <div class="post"> <!-- legal -->
                    <h1 class="titulo" id="articulo-3" style="color: #ffffffce; text-align: center;">Legal</h1>

                    <p style="color: #ffffffce;">
                        PROPIEDAD INTELECTUAL Y DERECHOS DE AUTOR:
                    </p>
                    <p style="color: #ffffffce;">
                        Todo el contenido de la página web de Sneackersun, incluyendo texto, gráficos y logotipos, está protegido por derechos de autor y propiedad intelectual.
                        No está permitido copiar, modificar o distribuir dicho contenido sin autorización expresa de Sneackersun.
                        Cualquier uso no autorizado constituye una violación de los derechos de propiedad intelectual.

                    </p>
                    <p style="color: #ffffffce;">
                        MARCAS REGISTRADAS:
                    </p>
                    <p style="color: #ffffffce;">
                        El logotipo de Sneackersun es una marca registrada en múltiples jurisdicciones en todo el mundo.
                        Otras marcas, logotipos y nombres de servicios utilizados en el sitio web también son propiedad de Sneackersun o de sus afiliados.
                        No se permite el uso de ninguna de las marcas pertenecientes a Sneackersun sin obtener previamente su permiso por escrito.
                    </p>
                    <p style="color: #ffffffce;">
                        EXENCIÓN DE RESPONSABILIDAD:
                    </p>
                    <p style="color: #ffffffce;">
                        La información proporcionada en el sitio web de Sneackersun se ofrece como una conveniencia para el visitante.
                        Aunque se hacen esfuerzos razonables para proporcionar información correcta y precisa, Sneackersun no ofrece garantías o representaciones expresas o implícitas sobre la fiabilidad, precisión o integridad de dicha información.
                        El uso del sitio web es bajo la discreción y riesgo exclusivo del usuario.
                    </p>
                    <p style="color: #ffffffce;">
                        RECOPILACIÓN DE DATOS:</p>
                    <p style="color: #ffffffce;">
                        Sneackersun recopila información personal de los usuarios, como nombres, direcciones de correo electrónico y datos de pago, con el propósito de procesar pedidos y brindar un servicio eficiente.</p>
                    <p style="color: #ffffffce;">
                        Los datos recopilados se almacenan de manera segura y no se comparten con terceros sin el consentimiento del usuario.</p>
                    </p>
                    <p style="color: #ffffffce;">
                        USO DE COOKIES:</p>
                    <p style="color: #ffffffce;">
                        Sneackersun utiliza cookies para mejorar la experiencia del usuario en el sitio web.</p>
                    <p style="color: #ffffffce;">
                        Las cookies pueden recopilar información sobre la navegación del usuario y preferencias para personalizar la experiencia.</p>
                    </p>
                    <p style="color: #ffffffce;">
                        SEGURIDAD Y ACCESO:</p>
                    <p style="color: #ffffffce;">
                        Sneackersun se compromete a proteger la información personal de los usuarios mediante medidas de seguridad adecuadas.</p>
                    <p style="color: #ffffffce;">
                        Los usuarios pueden acceder, corregir o eliminar sus datos personales en cualquier momento.</p>
                    </p>
                    <p style="color: #ffffffce;">
                        TRANSFERENCIAS BANCARIAS:</p>
                    <p style="color: #ffffffce;">
                        Sneackersun garantiza la seguridad de las transacciones bancarias realizadas a través del sitio web.</p>
                    </p>
                    <p style="color: #ffffffce;">
                        ENLACES A SITIOS AFILIADOS:</p>
                    <p style="color: #ffffffce;">
                        El sitio web de Sneackersun puede contener enlaces a sitios web afiliados.</p>
                    <p style="color: #ffffffce;">
                        Sneackersun no se hace responsable de las prácticas de privacidad de estos sitios externos.</p>
                    </p>

                </div>

                <div class="post"> <!-- metodos de pago -->
                    <h1 class="titulo" id="articulo-4" style="color: #ffffffce;  text-align: center;">Métodos de pago</h1>

                    <p style="color: #ffffffce;">
                        En nuestra tienda en línea contamos con plataformas de pago que cumplen con los más altos estándares de seguridad. A través de estas plataformas aceptamos los siguientes métodos de pago:
                        <mark>Tarjetas de Crédito, Tarjetas de Débito, pagos electrónicos PAYPAL</mark>
                    </p>

                    <p style="color: #ffffffce;">
                        SEGURIDAD
                    </p>

                    <p style="color: #ffffffce;">
                        - PRIVACIDAD ABSOLUTA: Nadie verá los datos de tu tarjeta de crédito o débito. Jamás. Toda la información financiera y personal está encriptada y protegida por SSL con una llave de encriptación de 128 bits.
                    </p>
                    <p style="color: #ffffffce;">
                        - ESTÁNDARES DE SEGURIDAD: Contamos con los más altos estándares de seguridad.
                    </p>
                    <p style="color: #ffffffce;">
                        FORMAS DE PAGO
                    </p>
                    <p class="text fw-lighter fs-6" style="color: #ffffffce;">- TARJETAS DE CRÉDITO con acreditación instantánea (valida las promociones a meses sin intereses vigentes).</p>
                    <p class="text  fw-lighter fs-6" style="color: #ffffffce;">
                        - TARJETAS DE DÉBITO con acreditación instantánea.
                    </p>

                    <p style="color: #ffffffce;">
                        - PAGO CON CUENTA DE PAYPAL:
                    </p>
                    <p style="color: #ffffffce;">
                        Es necesario tener una cuenta y registrar tus datos bancarios directamente en la página de PayPal.
                        Para más información acerca de los métodos de pago a través de la plataforma de PayPal, haz clic en el siguiente enlace:
                        <mark>www.paypal.com/mx/webapps/mpp/pay-online</mark>
                    </p>

                    <p style="color: #ffffffce;">
                        SEGURIDAD
                    </p>
                    <p class="text  fw-lighter fs-6" style="color: #ffffffce;">
                        - TUS DATOS, EL SECRETO MEJOR GUARDADO: PayPal no comparte tu información financiera con los comercios. Olvídate de tu número de tarjeta y código secreto. Para comprar solo necesitas tu correo electrónico y contraseña.
                    </p>
                    <p class="text  fw-lighter fs-6" style="color: #ffffffce;">
                        - PROTECCIÓN AL COMPRADOR: Si tu compra no sale como esperabas, y cumple los requisitos para entrar en el programa de Protección al Comprador, PayPal te ayudará. Para más información del programa, haz clic en el siguiente enlace: www.paypal.com/mx/webapps/mpp/paypal-buyer-protection
                    </p>


                    <p style="color: #ffffffce;">
                        MÉTODOS DE PAGO
                    </p>

                    <p class="text fw-lighter fs-6" style="color: #ffffffce;">- SALDO PAYPAL con acreditación instantánea.
                    </p>
                    <p class="text  fw-lighter fs-6" style="color: #ffffffce;">
                        - TARJETAS DE CRÉDITO con acreditación instantánea. En ocasiones podremos tener promociones de meses sin intereses, las cuales se anunciarán directamente en la sección de cada promoción.
                    </p>
                    <p class="text fw-lighter fs-6" style="color: #ffffffce;">- TARJETAS DE DÉBITO con acreditación instantánea.</p>
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