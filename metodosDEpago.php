
<?php
session_start();
require 'dbConfig.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="img/copil2.png">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/7f4ac6925c.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>
    <script type="text/javascript" src="librerias/jquery.js"></script>

    <!-- Simple line icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <link rel="stylesheet" href="estilos/estilosMV.css">

    <title>Métodos de Pago Copil</title>



</head>

<body class="bg-light">
    <center> <img src="img/copil2.png" width="110" height="90"> </center>
    <!--Navedaor, menú  -->
       <!--Navedaor, menú  -->
       <?php include("header.php"); ?>
    <br>
   


<div class="container marketing">
<h2 class="display-4" >Métodos de Pago</h2>
<hr class="featurette-divider" style="color: #FFB28C;" size="2">
  <p class="text fw-lighter ">
  En nuestra tienda en línea contamos con plataformas de pago que cumplen con los más altos estándares de seguridad. A través de estas plataformas aceptamos los siguientes métodos de pago:
    <mark>Tarjetas de Crédito, Tarjetas de Débito, pagos electrónicos PAYPAL</mark> 
</p>
  
  <p class="text fw-lighter fs-6 fw-semibold">
  SEGURIDAD
  </p>

  <p class="text  fw-lighter">
  - PRIVACIDAD ABSOLUTA: Nadie verá los datos de tu tarjeta de crédito o débito. Jamás. Toda la información financiera y personal está encriptada y protegida por SSL con una llave de encriptación de 128 bits.
    </p>
    <p class="text  fw-lighter">
    - ESTÁNDARES DE SEGURIDAD: Contamos con los más altos estándares de seguridad.
    </p>
    <p class="text fw-lighter fs-6 fw-semibold">
    FORMAS DE PAGO
  </p>
  <p class="text fw-lighter fs-6">- TARJETAS DE CRÉDITO con acreditación instantánea (valida las promociones a meses sin intereses vigentes).</p>
  <p class="text  fw-lighter fs-6">
  - TARJETAS DE DÉBITO con acreditación instantánea.
  </p>

  <p class="text fw-lighter fs-6 fw-semibold">
  - PAGO CON CUENTA DE PAYPAL:
  </p>
  <p class="text  fw-lighter">
  Es necesario tener una cuenta y registrar tus datos bancarios directamente en la página de PayPal.
Para más información acerca de los métodos de pago a través de la plataforma de PayPal, haz clic en el siguiente enlace: 
<mark>www.paypal.com/mx/webapps/mpp/pay-online</mark> 
</p>

  <p class="text fw-lighter fs-6 fw-semibold">
  SEGURIDAD
  </p>
  <p class="text  fw-lighter fs-6">
  - TUS DATOS, EL SECRETO MEJOR GUARDADO: PayPal no comparte tu información financiera con los comercios. Olvídate de tu número de tarjeta y código secreto. Para comprar solo necesitas tu correo electrónico y contraseña.
  </p>
  <p class="text  fw-lighter fs-6">
  - PROTECCIÓN AL COMPRADOR: Si tu compra no sale como esperabas, y cumple los requisitos para entrar en el programa de Protección al Comprador, PayPal te ayudará. Para más información del programa, haz clic en el siguiente enlace: www.paypal.com/mx/webapps/mpp/paypal-buyer-protection 
  </p>


  <p class="text fw-lighter fs-6 fw-semibold">
  MÉTODOS DE PAGO
  </p>
 
  <p class="text fw-lighter fs-6">- SALDO PAYPAL con acreditación instantánea.
</p>
  <p class="text  fw-lighter fs-6">
  - TARJETAS DE CRÉDITO con acreditación instantánea. En ocasiones podremos tener promociones de meses sin intereses, las cuales se anunciarán directamente en la sección de cada promoción.
  </p>
  <p class="text fw-lighter fs-6">- TARJETAS DE DÉBITO con acreditación instantánea.</p>
  
<br>
<hr class="featurette-divider" style="color: #FFB28C;" size="2">

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
 <!--Creditos  -->
 <?php include("creditos.php"); ?>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include the PayPal JavaScript SDK -->
<script>
    function regresar(regresar) {
        window.history.back();
    }
</script>
</body>

</html>