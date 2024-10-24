<?php
// Conectar a la base de datos
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "baseprueba";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$mensaje = ""; // Variable para el mensaje de éxito o error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre_apellido = $_POST['Nombre_Apellido'];
    $correo = $_POST['Correo'];
    $celular = $_POST['Celular'];
    $consulta = $_POST['Consulta'];
    $mensaje = $_POST['Mensaje'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO formularios (nombre_apellido, correo, celular, consulta, mensaje)
            VALUES ('$nombre_apellido', '$correo', '$celular', '$consulta', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        // Establecer el mensaje de éxito en una variable de sesión
        echo "<script>
                alert('Formulario enviado correctamente');
                window.location.href='Contacto.php'; 
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
                window.location.href='tu_formulario.php';
              </script>";
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
</head>
<body>

    <form method="POST" action="">
        <label for="Nombre_Apellido">Nombre y Apellido:</label>
        <input type="text" id="Nombre_Apellido" name="Nombre_Apellido" required><br>
        
        <label for="Correo">Correo:</label>
        <input type="email" id="Correo" name="Correo" required><br>
        
        <label for="Celular">Celular:</label>
        <input type="text" id="Celular" name="Celular" required><br>
        
        <label for="Consulta">Consulta:</label>
        <input type="text" id="Consulta" name="Consulta" required><br>
        
        <label for="Mensaje">Mensaje:</label>
        <textarea id="Mensaje" name="Mensaje" required></textarea><br>
        
        <button type="submit">Enviar</button>
    </form>

</body>
</html>
