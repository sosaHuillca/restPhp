<?php require "./conexion.php"; ?>
<?php
// Manejar el registro de nuevos usuarios
if ($_POST && isset($_POST['nuevoUsuario']) && isset($_POST['nuevaContrasenia'])) {
    $nuevoUsuario = $_POST['nuevoUsuario'];
    $nuevaContrasenia = $_POST['nuevaContrasenia'];

    // Consultar si el usuario ya existe en la base de datos
    $consulta = $conexion->prepare("SELECT * FROM users WHERE nombre = ?");
    $consulta->bind_param("s", $nuevoUsuario);
    $consulta->execute();
    $resultado = $consulta->get_result();

    // Verificar si el usuario ya existe
    if ($resultado->num_rows > 0) {
        echo "<script>alert('El usuario ya existe')</script>";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $consulta = $conexion->prepare("INSERT INTO users (nombre, contrasenia) VALUES (?, ?)");
        $consulta->bind_param("ss", $nuevoUsuario, $nuevaContrasenia);
        if ($consulta->execute()) {
            $_SESSION['usuario'] = $nuevoUsuario;
            header("location: /");
            exit;
        } else {
            echo "<script>alert('Error al registrar el usuario')</script>";
        }
    }
}

$conexion->close();
?>
<?php require "./cabecera.php"; ?>
        <h1>Crear cuenta</h1>
        <form action="/registrarse" method="post">
          Nombre de usuario: <input class="form-control" type="text" name="nuevoUsuario"/>
          Contrasenia : <input class="form-control" name="nuevaContrasenia"/>
          <button class="btn btn-success" type="submit">Registrarme</button>
        </form>

<?php require "./footer.php"; ?>
