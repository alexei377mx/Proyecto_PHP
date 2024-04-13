<?php
// Include config file
require_once "dbConfig.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingresa un nombre de usuario";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "El nombre de usuario solo puede contener letras, números, y guiones bajos";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = $db->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "Este nombre de usuario ya existe";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "¡Huy!, algo salió mal, por favor inténtalo de nuevo mas tarde";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingresa una contraseña";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "La contraseña debe de tener al menos 6 caracteres";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Por favor confirma tu contraseña";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Las contraseñas no son iguales";
        }
    }

    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Por favor ingresa tu nombre";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Por favor ingresa tu dirección de correo electrónico";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Por favor ingresa una dirección de correo electrónico válida";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate phone
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Por favor ingresa tu número de teléfono";
    } elseif (!preg_match('/^[0-9]{10}$/', trim($_POST["phone"]))) {
        $phone_err = "Por favor ingresa un número de teléfono válido de 10 dígitos";
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
    if (
        empty($username_err) && empty($password_err) && empty($confirm_password_err) &&
        empty($name_err) && empty($email_err) && empty($phone_err) && empty($address_err)
    ) {

        // Prepare an insert statement
        $sql = "INSERT INTO customers (username, password, name, email, phone, address) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = $db->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssss", $param_username, $param_password, $param_name, $param_email, $param_phone, $param_address);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_name = $name;
            $param_email = $email;
            $param_phone = $phone;
            $param_address = $address;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: login.php");
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

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Sneakersun Registro</title>
    <link rel="shortcut icon" href="img\sneackersun-logo-no-background.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Enlace a la hoja de estilos personalizada -->
    <link rel="stylesheet" type="text/css" href="styleLoginRegister.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="margin-bottom: 20px; background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px);">
            <a class="navbar-brand" href="index.php">
                <a class="navbar-brand" href="index.php" style="color: #ffffffce;">
                    <img src="img\sneackersun-logo-no-background.png" alt="Sneakersun Logo" width="50" height="50">
                    Sneakersun SA de CV
                </a>

                <p class="sneakersun-paragraph" style="color: #9b9b9b;">¡Pisa con estilo, camina con confianza,<br> descubre tu paso perfecto con Sneackersun!</p>
            </a>
        </nav>
    </header>

    <div class="wrapper" class="container fade-in" style="margin-top: 500px; background-color: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px);">
        <h2 style="color: #ffffffce; display: block; text-align: center;">Registro</h2>
        <p style="color: #ffffffce;">Por favor llena el formulario para crear una cuenta</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label style="color: #ffffffce; display: block; text-align: center;">Nombre de usuario</label>
                <input style="color: #ffffffce; background-color: transparent; border-color: rgba(129, 129, 129, 0.5)" type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label style="color: #ffffffce; display: block; text-align: center;">Contraseña</label>
                <input style="color: #ffffffce; background-color: transparent; border-color: rgba(129, 129, 129, 0.5)" type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label style="color: #ffffffce; display: block; text-align: center;">Confirmar Contraseña</label>
                <input style="color: #ffffffce; background-color: transparent; border-color: rgba(129, 129, 129, 0.5)" type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label style="color: #ffffffce; display: block; text-align: center;">Nombre</label>
                <input style="color: #ffffffce; background-color: transparent; border-color: rgba(129, 129, 129, 0.5)" type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label style="color: #ffffffce; display: block; text-align: center;">Email</label>
                <input style="color: #ffffffce; background-color: transparent; border-color: rgba(129, 129, 129, 0.5)" type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label style="color: #ffffffce; display: block; text-align: center;">Teléfono</label>
                <input style="color: #ffffffce; background-color: transparent; border-color: rgba(129, 129, 129, 0.5)" type="text" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label style="color: #ffffffce; display: block; text-align: center;">Dirección</label>
                <textarea style="color: #ffffffce; background-color: transparent; border-color: rgba(129, 129, 129, 0.5)" name="address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar" style="background-color: purple; color: #ffffffce; border: none;">
                <input type="reset" class="btn btn-secondary ml-2" value="Borrar campos" style="background-color: purple; color: #ffffffce; border: none;">
            </div>
            <p style="color: #ffffffce;">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>
        </form>
    </div>
</body>

</html>