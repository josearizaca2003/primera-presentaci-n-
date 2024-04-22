<?php
    include("../includes/head.php");
    include("../includes/conectar.php");
    $conexion = conectar();
?>

<!-- Begin Page Content -->
<div class="container-fluid">    
    <h1>Lista de Usuarios</h1>

    <?php
        $sql="SELECT * FROM usuarios";
        $registros=mysqli_query($conexion,$sql);

        echo "<table class='table table-success table-hover'>";
        
        echo "<th>D.N.I.</th>";
        echo "<th>Nombres</th>";
        echo "<th>Apellidos</th>";
        echo "<th>Teléfono</th>";
        echo "<th>Acciones</th>";

        while($fila = mysqli_fetch_array($registros)){
            echo "<tr>";
                echo "<td>".$fila['dni']."</td>";
                echo "<td>".$fila['nombres']."</td>";                
                echo "<td>".$fila['apellidos']."</td>";
                echo "<td>".$fila['telefono']."</td>";

                //botones para editar y eliminar un usuario
                echo "<td>";
                ?>
                    <button type="button" class="btn btn-primary" onClick="f_editar('<?php echo $fila['id']; ?>');">Editar</button>
                    <button type="button" class="btn btn-danger" onClick="f_eliminar('<?php echo $fila['id']; ?>');">Eliminar</button>
                <?php
                echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>    
</div>
<!-- /.container-fluid --> 

<?php
    include("../includes/foot.php");
?>

<script>
    function f_editar(pid){
        //redireccionar hacia el archivo 'modificar_usuario.php' con el ID del usuario
        location.href = "modificar_usuario.php?pid=" + pid;
    }

    function f_eliminar(id) {
        if (confirm('¿Está seguro de eliminar este usuario?')) {
            //redireccionar hacia el archivo 'eliminar_usuario.php' con el ID del usuario
            location.href = "eliminar_usuario.php?id=" + id;
        }
    }
</script>
