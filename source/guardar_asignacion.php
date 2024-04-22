
<?php
include("../includes/conectar.php");
$conexion = conectar();

$id_empresa = $_POST['id_empresa'];
$id_usuario = $_POST['id_usuario'];

// Guardar la asignación en la base de datos
$sql = "UPDATE empresas SET id_usuario='$id_usuario' WHERE id='$id_empresa'";
mysqli_query($conexion, $sql) or die("Error al asignar usuario.");

// Redirigir a la página de listar empresas
header("Location: listar_empresas.php");
?>
