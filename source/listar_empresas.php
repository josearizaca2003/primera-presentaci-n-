<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion = conectar();
?>
<div class="container-fluid">
    <h1>Lista de Empresas</h1>
    <?php
    $sql = "SELECT empresas.*, usuarios.nombres AS nombre_usuario, usuarios.apellidos AS apellido_usuario
            FROM empresas
            LEFT JOIN usuarios ON empresas.id_usuario = usuarios.id"; // Modificar la consulta SQL para obtener información del usuario asignado
    $registros = mysqli_query($conexion, $sql);
    echo "<table class='table table-success table-hover'>";
    echo "<th>Razón Social</th><th>RUC</th><th>Dirección</th><th>Teléfono</th><th>Correo</th><th>Usuario Asignado</th><th>Acciones</th>";
    while ($fila = mysqli_fetch_array($registros)) {
        echo "<tr>";
        echo "<td>".$fila['razon_social']."</td>";
        echo "<td>".$fila['ruc']."</td>";
        echo "<td>".$fila['direccion']."</td>";
        echo "<td>".$fila['telefono']."</td>";
        echo "<td>".$fila['correo']."</td>";
        echo "<td>".$fila['nombre_usuario']." ".$fila['apellido_usuario']."</td>"; // Mostrar el nombre y apellido del usuario asignado
        echo "<td>";
        ?>
        <button type="button" class="btn btn-primary" onClick="f_editar('<?php echo $fila['id']; ?>');">Editar</button>
        <button type="button" class="btn btn-danger" onClick="f_eliminar('<?php echo $fila['id']; ?>');">Eliminar</button>

        <button type="button" class="btn btn-success" onClick="f_mostrar_usuarios('<?php echo $fila['id']; ?>');">Asignar Usuario</button>

        <?php
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</div>

<!-- Modal para mostrar la lista de usuarios -->
<div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lista de Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="listaUsuarios">
                <!-- Aquí se mostrará la lista de usuarios -->
            </div>
        </div>
    </div>
</div>

<script src="<?php echo RUTAGENERAL; ?>templates/vendor/jquery/jquery.min.js"></script>

<script>

    var ID_EMPRESA; //esta es una variable GLOBAL

    $(document).ready(function(){ //inicio de jquery

        $("#modalUsuarios").on("shown.bs.modal", function () {
            // Obtener la lista de usuarios mediante una petición AJAX
            $.ajax({
                url: 'obtener_usuarios.php',
                method: 'GET',
                data: {id_empresa: ID_EMPRESA}, // Pasar el ID_EMPRESA en la solicitud AJAX
                success: function(response) {
                    // Mostrar la lista de usuarios en el cuerpo del modal
                    $('#listaUsuarios').html(response);
                }
            });
        });

        $("#modalUsuarios").on("hidden.bs.modal", function () {
            // Limpiar el contenido del modal cuando se cierre
            $('#listaUsuarios').html("");
        });

    }); //fin jquery


    function f_editar(id) {
        location.href = "modificar_empresa.php?id=" + id;
    }

    function f_eliminar(id) {
        if (confirm('¿Está seguro de eliminar esta empresa?')) {
            location.href = "eliminar_empresa.php?id=" + id;
        }
    }

    function f_mostrar_usuarios(pid_empresa){
        ID_EMPRESA = pid_empresa;
        // Mostrar el modal con la lista de usuarios
        $('#modalUsuarios').modal('show');
    }

    function f_asignar(pid_usuario){
        alert('funcion asignar para el usuario: '+pid_usuario);
        alert('funcion asignar para la empresa : '+ID_EMPRESA);

        //aqui es donde tenemos que hacer la asignacion:
        //...       


    }


</script>
<?php
include("../includes/foot.php");
?>
