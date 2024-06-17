<?php
session_start();
$servername= "localhost";
$username= "root";
$password = "";
$dbname ="formulario";

//Crear conexion
$conn = new mysqli($servername, $username, $password, $dbname);

//Verificar conexión
if($conn->connect_error){
    die("Conexion fallida: ". $conn->connect_error);
}

//Obtener datos del formulario de registro.
    $Nombre = htmlspecialchars($_POST["Nombre"]);
    $Fecha_de_Nacimiento = htmlspecialchars($_POST["Fecha_de_Nacimiento"]);
    $Carrera = htmlspecialchars($_POST["Carrera"]);
    $Sexo = htmlspecialchars( $_POST["Sexo"]);
    $Estado_Civil = htmlspecialchars($_POST["Estado_Civil"]);
    $Correo_Electronico =  htmlspecialchars($_POST["email"]);

//Inserción de datos dentro de la tabla registro en la base de datos "formulario"
$sql = "INSERT into registro (Nombre, Fecha_de_Nacimiento, Carrera, Sexo, Estado_Civil, email) values ('$Nombre', '$Fecha_de_Nacimiento', '$Carrera', '$Sexo', '$Estado_Civil', '$Correo_Electronico')";

if ($conn->query($sql) === TRUE) {
    // Guardar usuario en la sesión
    $_SESSION['registro_id'] = $conn->insert_id;
    // Redirigir al formulario de encuesta
    header("Location: encuesta_hoja1.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();





?>