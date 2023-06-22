<?php
session_start();

require "./conexion.php";

if ($_POST) {
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta a la base de datos
    $consulta = $conexion->prepare("SELECT * FROM users WHERE nombre = ? AND contrasenia = ?");
    $consulta->bind_param("ss", $usuario, $contrasenia);
    $consulta->execute();
    $resultado = $consulta->get_result();

    // Verificar si se encontró un usuario válido
    if ($resultado->num_rows > 0) {
        $_SESSION['usuario'] = $usuario;
        header("location: /");
    } else {
        echo "<script>alert('Usuario o contraseña incorrecta')</script>";
    }

    $conexion->close();
}
?>
<?php require "./cabecera.php"; ?>
<h1>Acceder a tu cuenta</h1>
        <form action="/login" method="post">
          Usuario: <input class="form-control" type="text" name="usuario"/>
          Pass: <input class="form-control" type="password" name="contrasenia"/>
          <button class="btn btn-success" type="submit">Ingresar</button>
        </form>
<?php require "./footer.php"; ?>
