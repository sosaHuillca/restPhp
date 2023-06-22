<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("location: /login");
    exit;
}
/*
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] === true) {
    $showElement = false;  // Mostrar el elemento
} else {
    $showElement = true; // Ocultar el elemento
}
 */
// Obtener el nombre de usuario desde la variable de sesión
    $showElement = false;  // Mostrar el elemento
$usuario = $_SESSION['usuario'];
?>

<?php require "./cabecera.php"; ?>
    <h1>Hola <?php echo $usuario; ?></h1>
    <p>Gracias por vistar</p>
    <hr>
    <p>Mas info</p>
<?php require "./footer.php"; ?>
