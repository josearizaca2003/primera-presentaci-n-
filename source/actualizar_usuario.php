<?php
    include("../includes/conectar.php");
    $conexion = conectar();

    // Obtener los datos del formulario
    $id_usuario = $_POST['txt_id_usuario'];
    $dni = $_POST['txt_dni'];
    $nombres = $_POST['txt_nombres'];
    $apellidos = $_POST['txt_apellidos'];
    $telefono = $_POST['txt_telefono'];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE usuarios 
            SET 
                dni='$dni', 
                nombres='$nombres', 
                apellidos='$apellidos', 
                telefono='$telefono'
            WHERE id='$id_usuario' ";

    mysqli_query($conexion, $sql);

    // Redirigir a la página de listar usuarios
    header("Location: listar_usuarios.php");
    exit(); // Asegurar que el script se detenga después de la redirección
?>
