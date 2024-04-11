<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro de Usuario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h2>Registro de Usuario</h2>
    <form action="register.php" method="post">
        <div>
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="phone">Teléfono:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div>
            <label for="address">Dirección:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div>
            <button type="submit">Registrar</button>
            <button type="reset">Limpiar</button>
        </div>
    </form>
</body>

</html>


<?php
// Include config file
require_once "dbConfig.php";

// Initialize variables with empty values
$username = $password = $name = $email = $phone = $address = "";
$username_err = $password_err = $name_err = $email_err = $phone_err = $address_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingresa un nombre de usuario";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingresa una contraseña";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Por favor ingresa tu nombre";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Por favor ingresa tu correo electrónico";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate phone
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Por favor ingresa tu número de teléfono";
    } else {
        $phone = trim($_POST["phone"]);
    }

    // Validate address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Por favor ingresa tu dirección";
    } else {
        $address = trim($_POST["address"]);
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($name_err) && empty($email_err) && empty($phone_err) && empty($address_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = $db->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "¡Huy!, algo salió mal, por favor inténtalo de nuevo más tarde";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $db->close();
}
?>


