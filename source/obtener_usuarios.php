<?php
include("../includes/conectar.php");
$conexion = conectar();

$id_empresa = $_GET['id_empresa']; // Obtener el ID_EMPRESA de la solicitud AJAX

$sql_usuarios = "SELECT * FROM usuarios";
$registros_usuarios = mysqli_query($conexion, $sql_usuarios);

echo '<form id="form_asignar_usuario" method="POST" action="guardar_asignacion.php">';
echo '<select name="id_usuario">';
while ($fila_user = mysqli_fetch_array($registros_usuarios)) {
    echo '<option value="'.$fila_user['id'].'">'.$fila_user['dni'].' '.$fila_user['nombres'].' '.$fila_user['apellidos'].'</option>';
}
echo '</select>';
echo '<input type="hidden" name="id_empresa" value="'.$id_empresa.'">'; // Usar el ID_EMPRESA obtenido de la solicitud AJAX
echo '<button type="submit">Asignar Usuario</button>';
echo '</form>';
?>
