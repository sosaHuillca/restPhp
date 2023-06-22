<?php
  require "./conexion.php";
    $mensaje = "Datos insertados correctamente";
    //header("location: /app/productos");
    $showElement = false;  // Mostrar el elemento

function setTimeout($callback, $seconds) {
    sleep($seconds); // Convertir milisegundos a microsegundos
    $callback();
}

if($_POST){
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];

  $fecha = new DateTime();

  $imagen = $fecha->getTimestamp()."_".$_FILES['archivo']['name'];

  $imagen_temporal = $_FILES['archivo']['tmp_name'];

  move_uploaded_file($imagen_temporal, "img/".$imagen);

  $sql = "insert into proyectos(nombre,imagen,descripcion) values ('$nombre','$imagen','$descripcion');";
      if (mysqli_query($conexion, $sql)) {
    header("location: /app/productos");
        echo "<h2 id='mimensaje'>$mensaje</h2>";

        echo "<script>
            setTimeout(function() {
                var mensaje = document.getElementById('mimensaje');
                window.location.href = '/app/productos'; // Redireccionar a la página de productos
                mensaje.remove();
            }, 3000);
        </script>";

  } else {
    echo "Error al insertar datos: " . mysqli_error($conn);
  }
}

if (isset($_GET['borrar'])) {
  $id = $_GET['borrar'];
  // Construir la consulta SQL de selección
  $imagen_query = "SELECT imagen FROM proyectos WHERE id = ".$id;
  $result = $conexion->query($imagen_query);

  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imagen = $row['imagen'];

    // Eliminar la imagen del directorio
    $ruta_imagen = "img/".$imagen;
    unlink($ruta_imagen);

    $sql = "DELETE FROM proyectos WHERE id = ".$id;

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
    header("location: /app/productos");
        echo "<h2 id='bmimensaje'>El dato con ID $id ha sido eliminado exitosamente</h2>";
        echo "<script>
            setTimeout(function() {
                var mensaje = document.getElementById('bmimensaje');
                mensaje.remove();
            }, 3000);
        </script>";
    } else {
        echo "<h2 id='mimensaje'>Error al eliminar el dato: $conexion->error </h2>";
        echo "<script>
            setTimeout(function() {
                var mensaje = document.getElementById('mimensaje');
                mensaje.remove();
            }, 3000);
        </script>";
    }
  }else{
        echo "<h2 id='mimensaje'>No se encontró la imagen o la fila en la base de datos</h2>";
        echo "<script>
            setTimeout(function() {
                var mensaje = document.getElementById('mimensaje');
                mensaje.remove();
            }, 3000);
        </script>";
  }
}
?>
<?php require "./cabecera.php"; ?>
        <form action="/app/productos" method="post" enctype="multipart/form-data">
          Nombre del proyecto: <input required class="form-control" type="text" name="nombre"/>
          Imagen del proyecto: <input required class="form-control" type="file" name="archivo"/>
          Descripcion del proyecto: <input required class="form-control" type="text" name="descripcion"/>
          <input class="btn btn-success" type="submit" value="Enviar proyecto">
        </form>

<table>
  <thead>
    <th>ID</th>
    <th>Nombre</th>
    <th>Imagen</th>
    <th>Descripcion</th>
  </thead>
  <tbody>
<?php
$sql = "select * from `proyectos`";
$result = $conexion->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $nombre = $row["nombre"];
    $imagen = $row["imagen"];
    $descripcion = $row["descripcion"];
?>
    <tr>
    <td><?echo $id;?></td>
    <td><?echo $nombre;?></td>
    <td>
      <img width="100" height="50" src="../img/<?echo $imagen;?>" alt="" srcset="" />
    </td>
    <td><?echo $descripcion;?></td>
    <td><a class="btn btn-danger" href="?borrar=<?php echo $id;?>">Eliminar</a></td>
    </tr>
<?php }?>
<?php }else{ 
echo "No se encontraron resultados.";
    }
?>
  </tbody>
</table>
<?php require "./footer.php"; ?>
