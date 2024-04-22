<?php
    include("../includes/head.php");
    include("../includes/conectar.php");

    $conexion = conectar();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Inicio de la zona central del sistema -->
    <h1>Modificar Datos de Empresa</h1>

    <?php
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM empresas WHERE id='$id'";
        $registro = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_array($registro);
    ?>

    <form method="POST" action="actualizar_empresa.php">
        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

        <div class="row mb-3">
            <label for="razon_social" class="col-sm-2 col-form-label">Razón Social</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="razon_social" value="<?php echo $fila['razon_social']; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="ruc" class="col-sm-2 col-form-label">RUC</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="ruc" value="<?php echo $fila['ruc']; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="direccion" value="<?php echo $fila['direccion']; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="telefono" value="<?php echo $fila['telefono']; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="correo" class="col-sm-2 col-form-label">Correo Electrónico</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="correo" value="<?php echo $fila['correo']; ?>">
            </div>
        </div>

        <!-- Campo de selección de usuario -->
        <div class="row mb-3">
            <label for="id_usuario" class="col-sm-2 col-form-label">Usuario Asignado</label>
            <div class="col-sm-10">
                <select class="form-control" name="id_usuario">
                    <?php
                        // Obtener información del usuario asignado
                        $sql_usuario = "SELECT * FROM usuarios WHERE id=" . $fila['id_usuario'];
                        $result_usuario = mysqli_query($conexion, $sql_usuario);
                        $usuario = mysqli_fetch_assoc($result_usuario);
                        // Mostrar la opción seleccionada
                        echo '<option value="'.$usuario['id'].'" selected>'.$usuario['nombres'].' '.$usuario['apellidos'].'</option>';
                        // Obtener los demás usuarios disponibles
                        $sql_usuarios = "SELECT * FROM usuarios WHERE id != " . $fila['id_usuario'];
                        $result_usuarios = mysqli_query($conexion, $sql_usuarios);
                        // Mostrar los demás usuarios disponibles
                        while ($row = mysqli_fetch_assoc($result_usuarios)) {
                            echo '<option value="'.$row['id'].'">'.$row['nombres'].' '.$row['apellidos'].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Empresa</button>
    </form>

    <!-- Fin de la zona central del sistema -->
</div>
<!-- /.container-fluid --> 

<?php
    include("../includes/foot.php");
?>
