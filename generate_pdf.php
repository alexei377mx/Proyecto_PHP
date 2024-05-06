<?php include_once "header.php"; ?>
<?php
require 'fpdf186/fpdf.php';

include 'dbConfig.php';
global $title;
// Funcion para dividir el texto respetando las palabras y limitando el numero de caracteres por linea
function wrapText($text, $maxChars)
{
    $wrappedText = '';
    $lines = explode("\n", $text);
    foreach ($lines as $line) {
        $words = explode(' ', $line);
        $lineLength = 0;
        $wrappedLine = '';
        foreach ($words as $word) {
            $wordLength = strlen($word);
            if ($lineLength + $wordLength <= $maxChars) {
                $wrappedLine .= $word . ' ';
                $lineLength += $wordLength + 1;
            } else {
                $wrappedText .= trim($wrappedLine) . "\n";
                $wrappedLine = $word . ' ';
                $lineLength = $wordLength + 1;
            }
        }
        $wrappedText .= trim($wrappedLine) . "\n";
    }
    return trim($wrappedText);
}

// Obtener el ID del usuario de la sesion
$user_id = $_SESSION["id"];

// Consulta SQL para obtener los detalles del cliente
$sql_customer_details = "SELECT name, address, email, phone FROM customers WHERE id = ?";
$stmt_customer_details = $db->prepare($sql_customer_details);
$stmt_customer_details->bind_param("i", $user_id);
$stmt_customer_details->execute();
$stmt_customer_details->bind_result($customer_name, $customer_address, $customer_email, $customer_phone);
$stmt_customer_details->fetch();
$stmt_customer_details->close();

// Obtener el ID de la orden desde la URL
if (isset($_GET['order_id']) && !empty($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
} else {
    // Si no se proporciona un ID de orden valido en la URL, muestra un mensaje de error
    die("ID de orden no valido.");
}

// Consulta SQL para obtener los detalles de la orden especifica
$sql_order_details = "SELECT p.name, oi.quantity, p.price FROM order_items oi INNER JOIN products p ON oi.product_id = p.id WHERE oi.order_id = ?";
$stmt_order_details = $db->prepare($sql_order_details);
$stmt_order_details->bind_param("i", $order_id);
$stmt_order_details->execute();
$stmt_order_details->store_result();

// Verificar si se encontraron productos para la orden especifica
if ($stmt_order_details->num_rows > 0) {
    // Consulta SQL para obtener la fecha de compra utilizando la columna created de la tabla "orders"
    $sql_purchase_date = "SELECT created FROM orders WHERE id = ?";
    $stmt_purchase_date = $db->prepare($sql_purchase_date);
    $stmt_purchase_date->bind_param("i", $order_id);
    $stmt_purchase_date->execute();
    $stmt_purchase_date->bind_result($purchase_date);
    $stmt_purchase_date->fetch();
    $stmt_purchase_date->close();

    // Crear una instancia de FPDF con orientacion vertical
    $pdf = new FPDF('P', 'mm', 'Letter'); // 'P' para orientacion vertical, 'Letter' para tamaño de pagina carta
    $pdf->AddPage();

    // Definir la fuente y el tamaño del texto para el titulo
    $pdf->SetFont('Arial', 'B', 16);

    // Agregar nombre de la empresa, direccion, correo, numero y fecha de la compra
    $companyInfo = array(
        'address' => 'Av. Tecnologico #123, Col. Centro, Ciudad de Mexico',
        'email' => 'info@sneakersun.com.mx',
        'phone' => '+52 55 2411 1229',
        'purchase_date' => $purchase_date // Fecha de compra obtenida de la base de datos
    );

    $pdf->Cell(0, 10, 'SNEAKERSUN SA DE CV', 0, 1, 'C');

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, $companyInfo['address'], 0, 1, 'R');
    $pdf->Cell(0, 10, 'Correo: ' . $companyInfo['email'] . ' - Telefono: ' . $companyInfo['phone'], 0, 1, 'R');
    $pdf->Ln(10); // Espacio entre la informacion de la empresa y la tabla
    $pdf->SetFont('Arial', 'B', 12); // Establecer la fuente, el estilo y el tamaño del texto en negritas
    $pdf->Cell(0, 10, 'FACTURA DE COMPRA', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12); // Establecer la fuente y el tamaño del texto
    $pdf->Cell(0, 10, 'Fecha de Compra: ' . $companyInfo['purchase_date'], 0, 1, 'R');

    $pdf->SetFont('Arial', 'B', 12); // Establecer la fuente, el estilo y el tamaño del texto en negritas
$pdf->Cell(0, 10, 'ID de la orden: ' . $order_id, 0, 1, 'C'); // Agregar el texto centrado




    // Definir el margen izquierdo y derecho
    $margin = 10;
    $pdf->SetMargins($margin, $margin);

    // Calcular el ancho de cada columna
    $columnWidths = array(80, 40, 30, 40); // Ancho predeterminado de las columnas
    $availableWidth = $pdf->GetPageWidth() - ($margin * 2) - array_sum($columnWidths); // Ancho disponible para la tabla
    $columnWidths[0] += $availableWidth; // La primera columna (Producto) toma el resto del ancho disponible

    // Encabezados de la tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell($columnWidths[0], 10, 'Producto', 1, 0, 'C');
    $pdf->Cell($columnWidths[1], 10, 'Precio', 1, 0, 'C');
    $pdf->Cell($columnWidths[2], 10, 'Cantidad', 1, 0, 'C');
    $pdf->Cell($columnWidths[3], 10, 'Total', 1, 1, 'C');

    // Variable para alternar el color de las filas
    $fill = false;

    // Variable para almacenar el total de la orden
    $total_order = 0;

    // Enlazar las variables de resultado
    $stmt_order_details->bind_result($product_name, $quantity, $price);

    // Recorrer cada producto en la orden especifica
    while ($stmt_order_details->fetch()) {
        // Calcular el total para este producto
        $total_product = $price * $quantity;

        // Agregar el total de este producto al total de la orden actual
        $total_order += $total_product;

        // Dividir el nombre del producto en lineas mas cortas respetando las palabras
        $wrappedProductName = wrapText($product_name, floor($columnWidths[0] / 4)); // Aproximadamente un cuarto del ancho de la primera columna

        // Agregar los detalles del producto a la tabla
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell($columnWidths[0], 10, $wrappedProductName, 1, 0, 'L'); // Producto
        $pdf->Cell($columnWidths[1], 10, $price, 1, 0, 'C'); // Precio
        $pdf->Cell($columnWidths[2], 10, $quantity, 1, 0, 'C'); // Cantidad
        $pdf->Cell($columnWidths[3], 10, $total_product, 1, 1, 'C'); // Total

        // Cambiar el color de fondo para la siguiente fila
        $fill = !$fill;
    }

    // Mostrar el total de la orden
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(array_sum($columnWidths) - $columnWidths[3], 10, 'Total de la Orden:', 1, 0, 'R');
    $pdf->Cell($columnWidths[3], 10, $total_order, 1, 0, 'C');

    // Agregar informacion del cliente obtenida de la tabla "nombre"
    $pdf->Ln(10); // Espacio entre la tabla y la informacion del cliente
    $pdf->Ln(10); // Espacio entre la informacion de la empresa y la tabla
    $pdf->Cell(0, 10, 'Informacion del Cliente', 0, 1, 'L');
    $pdf->SetFont('Arial', '', 12); // Establecer la fuente y el tamaño del texto
    $pdf->Cell(0, 10, 'Nombre: ' . $customer_name, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Direccion: ' . $customer_address, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Correo: ' . $customer_email . ' - Telefono: ' . $customer_phone, 0, 1, 'L');



    // Generar un codigo de barras aleatorio de 20 digitos
    $barcode = '';
    for ($i = 0; $i < 20; $i++) {
        $barcode .= rand(0, 9);
    }
    $pdf->Ln(10); // Espacio entre la informacion del cliente y el codigo de barras
    $pdf->Cell(0, 10, 'Codigo de Barras: ' . $barcode, 0, 1, 'C');

    $title = 'Sneakersun ID orden: ' . $order_id;
$pdf->SetTitle($title);

    // Salida del PDF
    $pdf->Output();
} else {
    // Si no se encontraron productos para la orden especifica
    echo "<p style='color: #ffffffce;'>No se encontraron productos para la orden ID: $order_id</p>";
}

// Cerrar las consultas preparadas y la conexion a la base de datos
$stmt_order_details->close();
$db->close();


?>
