<!-- Powered by Alexei Escorcia Macías 2024-->
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

<!-- encabezado -->

<head>
    <title>Sneakersun - Mis compras</title>
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
                        <?php
                        // Comprueba si la sesión está iniciada
                        /*  */

                        if (isset($_SESSION['loggedin'])) {
                            // Si la sesión está iniciada, muestra el enlace "iniciado"
                            echo '<a class="nav-link" href="viewCart.php">Mi Carrito</a>';
                        } else {
                            // Si la sesión no está iniciada, muestra el enlace "noiniciado"
                            echo '<a class="nav-link" style="color: #9b9b9b;" href="login.php">Iniciar sesión<br></a>';
                        }
                        ?>
                    </li>

                    <!-- Menú desplegable -->
                    <?php
                    // Comprueba si la sesión está iniciada


                    if (isset($_SESSION['loggedin'])) {
                        // Si la sesión está iniciada, muestra el enlace "iniciado"

                        echo '
								<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Cuenta
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: rgba(0, 0, 0, 0.25); backdrop-filter: blur(5px);">
								<a class="nav-link" style="color: #9b9b9b;" href="orders.php">Mis<br>compras</a>
		<a class="nav-link" style="color: #9b9b9b;" href="reset-password.php">Cambiar<br>Contraseña</a>
		<a class="nav-link" style="color: #9b9b9b;" href="logout.php">Cerrar<br>Sesión</a>';
                    } else {
                        // Si la sesión no está iniciada, muestra el enlace "noiniciado"
                        echo '';
                    }
                    ?>


            </div>
            </li>
            </ul>
            </div>
        </nav>
    </header>

    <div class="container" style="background-color: rgba(255, 255, 255, 0.05); margin-top: 100px; margin-bottom: 20px;">
        <h1 style="color: #ffffffce; text-align: center;">Tus compras</h1>
        <br>
        <?php
        // Obtener el ID del usuario de la sesión
        $user_id = $_SESSION["id"];

        // Consulta SQL para seleccionar los ID de orden únicos del usuario actual
        $sql_orders = "SELECT id FROM orders WHERE customer_id = ?";
        $stmt_orders = $db->prepare($sql_orders);
        $stmt_orders->bind_param("i", $user_id);
        $stmt_orders->execute();
        $stmt_orders->store_result();

        // Verificar si se encontraron órdenes para el usuario actual
        if ($stmt_orders->num_rows > 0) {
            // Enlazar las variables de resultado
            $stmt_orders->bind_result($order_id);

            // Recorrer cada orden del usuario
            while ($stmt_orders->fetch()) {
                // Consulta SQL para obtener los detalles de cada producto en la orden actual
                $sql_order_details = "SELECT p.name, oi.quantity, p.price FROM order_items oi INNER JOIN products p ON oi.product_id = p.id WHERE oi.order_id = ?";
                $stmt_order_details = $db->prepare($sql_order_details);
                $stmt_order_details->bind_param("i", $order_id);
                $stmt_order_details->execute();
                $stmt_order_details->store_result();

                // Verificar si se encontraron productos para la orden actual
                if ($stmt_order_details->num_rows > 0) {
                    // Enlazar las variables de resultado
                    $stmt_order_details->bind_result($product_name, $quantity, $price);

                    // Mostrar una tabla HTML para la orden actual
        ?>
                    <div class="table-responsive">

                        <h2 style="color: #ffffffce; text-align: center;">Orden ID: <?php echo $order_id; ?></h2>
                         <!-- Botón para imprimir factura -->
        <div style="text-align: right; margin-bottom: 20px;">
            <?php
            if (isset($_SESSION['loggedin'])) {
                echo '<a href="generate_pdf.php?order_id=' . $order_id . '" target="_blank" class="btn btn-primary" style="background-color: purple; color: #ffffffce; border: none;">Imprimir Factura</a>';
            }
            ?>
                        <table class="table" style="border: 1px solid gray;">
                            <thead class="thead">
                                <tr style="background-color: rgba(0, 0, 0, 0.3);">
                                    <!-- <th>Imagen</th> -->
                                    <th style="color: #ffffffce;">Producto</th>
                                    <th style="color: #ffffffce;">Precio</th>
                                    <th style="color: #ffffffce;">Cantidad</th>
                                    <th style="color: #ffffffce;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // Variable para almacenar el total de la orden actual
                                $total_order = 0;

                                // Recorrer cada producto en la orden actual
                                while ($stmt_order_details->fetch()) {
                                    // Calcular el total para este producto
                                    $total_product = $price * $quantity;

                                    // Agregar el total de este producto al total de la orden actual
                                    $total_order += $total_product;

                                    // Mostrar los detalles del producto en la tabla
                                ?>
                                    <tr>
                                        <td style="color: #ffffffce;"><!-- nombre del Producto --> <?php echo $product_name; ?></td>
                                        <td style="color: #ffffffce;"><?php echo $price; ?> MXN</td>
                                        <td style="color: #ffffffce;"><?php echo $quantity; ?></td>
                                        <td style="color: #ffffffce;"><?php echo $total_product; ?> MXN</td>
                                    </tr>
                                <?php
                                }

                                // Mostrar el total de la orden actual
                                ?>
                                <tr>
                                    <td class="text-right" style="color: #ffffffce;" colspan='3'>Total de la Orden:</td>
                                    <td style="color: #ffffffce;"><?php echo $total_order; ?> MXN</td>
                                </tr>
                            </tbody>
                        </table>
            <?php
                } else {
                    echo "<p style='color: #ffffffce;'>No se encontraron productos para la orden ID: $order_id</p>";
                }

                $stmt_order_details->close();
            }
        } else {
            echo "<p style='color: #ffffffce;'>No se encontraron órdenes para este usuario.</p>";
        }

        $stmt_orders->close();
        $db->close();
            ?>
</body>

</html>