<?php
include("../includes/conectar.php");
$conexion = conectar();

// Verificar si se ha proporcionado un ID válido
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Construir y ejecutar la consulta SQL para eliminar el usuario
    $sql = "DELETE FROM usuarios WHERE id='$id'";
    if(mysqli_query($conexion, $sql)) {
        // La eliminación fue exitosa, redirigir a la página de listado de usuarios
        header("Location: listar_usuarios.php");
        exit; // Importante: detener la ejecución del script después de la redirección
    } else {
        // La eliminación falló, mostrar un mensaje de error
        echo "Error al eliminar el usuario: " . mysqli_error($conexion);
    }
} else {
    // No se proporcionó un ID válido, mostrar un mensaje de error
    echo "ID de usuario no válido.";
}
?>
