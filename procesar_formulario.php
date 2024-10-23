<?php
// Conectar a la base de datos
$servername = "localhost"; // 
$username = "root"; // 
$password = ""; // 
$dbname = "baseprueba"; // Tu base de datos se llama "formulario"

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

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
    echo "Formulario enviado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>