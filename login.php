<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

// Include config file
require_once "dbConfig.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingresa un usuario";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingresa tu contraseña";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM customers WHERE username = ?";

        if ($stmt = $db->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: index.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Nombre de usuario y/o contraseña incorrecto";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Nombre de usuario y/o contraseña incorrecto";
                }
            } else {
                echo "¡Huy!, Algo salió mal. Por favor intentalo de nuevo mas tarde.";
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
    <title>Sneakersun Login</title>
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


    <div class="wrapper fade-in" class="container fade-in" style="margin-top: 90px; background-color: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px);">
        <h2 style="color: #ffffffce; display: block; text-align: center;">Iniciar Sesión</h2>
        <p style="color: #ffffffce;">Por favor ingresa tus credenciales para iniciar sesión.</p>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label style="color: #ffffffce; display: block; text-align: center;">Usuario</label>
                <input style="background-color: transparent; border-color: rgba(129, 129, 129, 0.5); color: #ffffffce;" type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label style="color: #ffffffce; display: block; text-align: center;">Contraseña</label>
                <input style="color: #ffffffce; background-color: transparent; border-color: rgba(129, 129, 129, 0.5)" type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Iniciar Sesión"  style="background-color: purple; color: #ffffffce; border: none;">
            </div>
            <p style="color: #ffffffce;">¿No tienes una cuenta?
                <a href="register.php">Regístrate ahora</a>
            </p>
        </form>
    </div>
</body>

</html>