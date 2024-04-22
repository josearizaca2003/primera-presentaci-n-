<?php
include("../includes/conectar.php");
$conexion = conectar();

$id = $_POST['id'];
$razon_social = $_POST['razon_social'];
$ruc = $_POST['ruc'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

// Verificar si se ha seleccionado un nuevo usuario
if(isset($_POST['id_usuario'])) {
    $id_usuario = $_POST['id_usuario'];
    // Actualizar la empresa con el nuevo usuario
    $sql = "UPDATE empresas SET razon_social='$razon_social', ruc='$ruc', direccion='$direccion', telefono='$telefono', correo='$correo', id_usuario='$id_usuario' WHERE id='$id'";
} else {
    // Si no se selecciona un nuevo usuario, actualizar la empresa sin cambiar el campo id_usuario
    $sql = "UPDATE empresas SET razon_social='$razon_social', ruc='$ruc', direccion='$direccion', telefono='$telefono', correo='$correo' WHERE id='$id'";
}

// Ejecutar la consulta SQL
if(mysqli_query($conexion, $sql)) {
    // Redirigir a la página de listado de empresas después de la actualización
    header("Location: listar_empresas.php");
    exit; // Detener la ejecución del script después de la redirección
} else {
    // Mostrar un mensaje de error si la consulta falla
    die("Error al actualizar la empresa: " . mysqli_error($conexion));
}
?>
