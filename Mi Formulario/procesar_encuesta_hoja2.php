<?php
//Inicia la configuracion de la base de datos en MYSQL.
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
$pregunta4 = htmlspecialchars($_POST['pregunta4']);
$pregunta5 = htmlspecialchars($_POST['pregunta5']);
$pregunta6 = htmlspecialchars($_POST['pregunta6']);

 /**
  * Esta parte del codigo fue diseñada con ayuda de chat GPT.
  * Indica la inserción de datos mediante una consulta a la tabla encuesta_hoja2. 
*/  

//Insercion de datos en la tabla encuesta_hoja2 en la base de datos formulario
$sql = "INSERT into encuesta_hoja2(registro_id, pregunta4, pregunta5, pregunta6) values ('$registro_id', '$pregunta4', '$pregunta5', '$pregunta6')";

if ($conn->query($sql) === TRUE) {
    echo "encuesta enviada con exito";
    header("Location: final.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


