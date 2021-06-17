<?php 
session_start();

include_once '../../includes/connectDb.php';
$conn = getConnection();
?>

<?php
$sql = "SELECT * FROM usuario";
$stmt = $conn->prepare($sql); // prepara a query para ser executada
$stmt->execute(); // realiza a execução da query
$resultado = $stmt->fetchAll(); // pega o resultado da execução da query

print_r( $resultado);


?>