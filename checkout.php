<!-- sandbox paypal
    sb-ylpxc30409911@personal.example.com
    T.U@0B&u
-->

<?php

include 'dbConfig.php';


include 'Cart.php';
$cart = new Cart;


if ($cart->total_items() <= 0) {
    header("Location: index.php");
}


$_SESSION['sessCustomerID'] = 1;


$query = $db->query("SELECT * FROM customers WHERE id = " . $_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">


<head>
    <title>Sneakersun - Revisión</title>
    <link rel="shortcut icon" href="img\sneackersun-logo-no-background.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Enlace a la hoja de estilos personalizada -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

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
                    <!-- Menú desplegable -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cuenta
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: rgba(0, 0, 0, 0.25); backdrop-filter: blur(5px);">
                            <a class="nav-link" style="color: #9b9b9b;" href="viewCart.php">Carrito</a>
                            <a class="nav-link" style="color: #9b9b9b;" href="orders.php">Mis<br>compras</a>
                            <a class="nav-link" style="color: #9b9b9b;" href="reset-password.php">Cambiar<br>Contraseña</a>
                            <a class="nav-link" style="color: #9b9b9b;" href="logout.php">Cerrar<br>Sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <div class="container" style="background-color: rgba(255, 255, 255, 0.05); margin-top: 100px; margin-bottom: 20px;">
        <h1 class="mb-4" style="color: #ffffffce; text-align: center;">Revisa tu carrito antes de pagar</h1>
        <div class="table-responsive">
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
                    if ($cart->total_items() > 0) {
                        $cartItems = $cart->contents();
                        foreach ($cartItems as $item) {
                    ?>
                            <tr style="background-color: rgba(0, 0, 0, 0.1);">
                                <!-- <td><img src="<?php echo $item["URLimg"]; ?>" alt="Product Image" style="height: 100px;width: auto;"></td> -->
                                <td style="color: #ffffffce;"><?php echo $item["name"]; ?></td>
                                <td style="color: #ffffffce;"><?php echo '$' . $item["price"] . ' MXN'; ?></td>
                                <td><input style="background-color: #ffffffce; border-color: rgba(129, 129, 129, 0.5)" type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                                <td style="color: #ffffffce;"><?php echo '$' . $item["subtotal"] . ' MXN'; ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="4">
                                <p>Carrito Vacio</p>
                            </td>
                        <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <?php if ($cart->total_items() > 0) { ?>
                            <td style="color: #ffffffce;" class="text-center"><strong>Total <?php echo '$' . $cart->total() . ' MXN'; ?></strong></td>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>
            <a href="productos.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i>Continua Comprando</a>

            <div class="shipAddr" class="container" style="background-color: rgba(255, 255, 255, 0.05); margin-top: 10px; margin-bottom: 20px;">
                <h4 style="color: #ffffffce; text-align: center;">Detalles de envío</h4>

                <?php
                // Incluir el archivo de configuración de la base de datos y comenzar la sesión
                require_once "dbConfig.php";
                /* session_start(); */

                // Verificar si el usuario está autenticado
                if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) {
                    // Redirigir al usuario a la página de inicio de sesión si no está autenticado
                    header("location: login.php");
                    exit;
                }

                // Obtener el ID de usuario de la sesión
                $user_id = $_SESSION["id"];

                // Consulta SQL para seleccionar los datos de customers para el usuario actual
                $sql = "SELECT name, email, phone, address FROM customers WHERE id = ?";

                // Preparar la consulta
                if ($stmt = $db->prepare($sql)) {
                    // Bind parameters
                    $stmt->bind_param("i", $user_id);

                    // Ejecutar la consulta
                    if ($stmt->execute()) {
                        // Guardar el resultado
                        $stmt->store_result();

                        // Enlazar las variables de resultado
                        $stmt->bind_result($name, $email, $phone, $address);

                        // Mostrar los datos en una tabla HTML
                        echo "<table class='table' style='border: 1px solid gray;'>";
                        echo "<tr>
                        <th style='color: #ffffffce;'>Nombre</th>
                        <th style='color: #ffffffce;'>Email</th>
                        <th style='color: #ffffffce;'>Teléfono</th>
                        <th style='color: #ffffffce;'>Dirección</th>
                        </tr>";
                        while ($stmt->fetch()) {
                            echo "<tr>
                            <td style='color: #ffffffce;'>" . $name . "</td>
                            <td style='color: #ffffffce;'>" . $email . "</td>
                            <td style='color: #ffffffce;'>" . $phone . "</td>
                            <td style='color: #ffffffce;'>" . $address . "</td>
                            </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "¡Ups! Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
                    }

                    // Cerrar la declaración
                    $stmt->close();
                }

                // Cerrar la conexión a la base de datos
                $db->close();
                ?>

            </div>

            <?php
            // Include config file
            require_once "dbConfig.php";
            /* echo "El ID del usuari0000o actual es: " . $_SESSION['id']; */

            ?>
            </table>

            <!--   <div class="footBtn">

                <a href="pago.php" class="btn btn-success orderBtn float-right">Pagar<i class="glyphicon glyphicon-menu-right"></i></a>

                <a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn float-right">Realizar Orden<i class="glyphicon glyphicon-menu-right"></i></a>
            </div> -->
        </div>

        <div class="container" style="display: block; background-color: rgba(255, 255, 255, 0.05); margin-top: 10px; margin-bottom: 20px; text-align: center;">

            <div>
                <h6 style="color: #ffffffce;">Estás a punto de pagar: <?php echo '$' . $cart->total() . ' MXN'; ?>
                </h6>

                <br>
                <div id="paypal-button-container"></div>
            </div>


            <script src="https://www.paypal.com/sdk/js?client-id=AQS77ljM6yn5InALQQIUPrFm2OtpsxwBwWDBfymwtUbvUX8dvAP4TPLZBaz-47Dhuvxo388Nr2mdS_Dk&currency=MXN"></script>

            <script>
                paypal.Buttons({

                    // Sets up the transaction when a payment button is clicked
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '<?php echo $cart->total(); ?>' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                                }
                            }]
                        });
                    },

                    // Finalize the transaction after payer approval
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(orderData) {
                            // Successful capture! For dev/demo purposes:
                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                            console.log(data);
                            var transaction = orderData.purchase_units[0].payments.captures[0];
                            alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                            // When ready to go live, remove the alert and show a success message within this page. For example:
                            // var element = document.getElementById('paypal-button-container');
                            // element.innerHTML = '';
                            // element.innerHTML = '<h3>Thank you for your payment!</h3>';

                            /* window.location.href = "../controlador/Pago.php?paypal=" + transaction.id; */

                            window.location.href = "cartAction.php?action=placeOrder";
                            // actions.redirect('index.php');
                        });
                    }
                }).render('#paypal-button-container');
            </script>
        </div>


</body>

</html>