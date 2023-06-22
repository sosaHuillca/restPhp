<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("location: /login");
    exit;
}

$showElement = false;

// Obtener el nombre de usuario desde la variable de sesión
$usuario = $_SESSION['usuario'];
?>

<?php require "./cabecera.php"; ?>

    <h1>Bienvenido a sitio de Proyectos</h1>
    <p>Estos son algunos: </p>
    <ol>
        <li><a href="/app/productos">registro de datos</a></li>
    </ol>
<?php require "./footer.php"; ?>
