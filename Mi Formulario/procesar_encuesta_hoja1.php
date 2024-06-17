<?php
session_start();
$servername= "localhost";
$username= "root";
$password = "";
$dbname ="formulario";

/**
 * Esta parte del codigo fue desarrollada con la ayuda de Chat GPT.
 */
//Crear conexion
$conn = new mysqli($servername, $username, $password, $dbname);

//Verificar conexión
if($conn->connect_error){
    die("Conexion fallida: ". $conn->connect_error);
}

//Obtener datos del formulario de registro y de la encuesta.
$registro_id = htmlspecialchars($_SESSION['registro_id']);
$pregunta1 = htmlspecialchars($_POST['pregunta1']);
$pregunta2 = htmlspecialchars($_POST['pregunta2']);
$pregunta3 = htmlspecialchars($_POST['pregunta3']);

   
/**
  * Esta parte del codigo fue diseñada con ayuda de chat GPT.
  * Indica la inserción de datos mediante una consulta a la tabla encuesta_hoja2. 
*/  



//Insercion de datos en la base de datos
$sql = "INSERT into encuesta_hoja1(registro_id, pregunta1, pregunta2, pregunta3) values ('$registro_id', '$pregunta1', '$pregunta2', '$pregunta3')";

if ($conn->query($sql) === TRUE) {
    echo "hoja de encuesta registrada con exito";
    header("Location: encuesta_hoja2.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



