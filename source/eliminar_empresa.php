<?php
include("../includes/conectar.php");
$conexion = conectar();

// Verificar si se ha proporcionado un ID válido
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Construir y ejecutar la consulta SQL para eliminar la empresa
    $sql = "DELETE FROM empresas WHERE id='$id'";
    if(mysqli_query($conexion, $sql)) {
        // La eliminación fue exitosa, redirigir a la página de listado de empresas
        header("Location: listar_empresas.php");
        exit; // Importante: detener la ejecución del script después de la redirección
    } else {
        // La eliminación falló, mostrar un mensaje de error
        echo "Error al eliminar la empresa: " . mysqli_error($conexion);
    }
} else {
    // No se proporcionó un ID válido, mostrar un mensaje de error
    echo "ID de empresa no válido.";
}
?>
