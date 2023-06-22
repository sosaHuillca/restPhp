<!DOCTYPE html>
<html lang="en">
<head>
<title>PortaFolio</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/css/style.css" />
<?php
// Realiza alguna lógica en PHP para determinar si se muestra el elemento o no
//$showElement = true;

// Genera código CSS dinámicamente en función de la variable $showElement
echo '<style>';
if ($showElement) {
    echo '.elementToToggle { display: block; }';  // Mostrar el elemento
} else {
    echo '.elementToToggle { display: none; }';   // Ocultar el elemento
}
echo '</style>';
?>

</head>
<body>
<header>
  <nav>
    <a href="/">Inicio</a>
    <a href="/proyectos">Proyectos</a>
  </nav>
  <div class="user-login">
    <a class="elementToToggle" href="/login">entrar</a>
    <a class="elementToToggle" href="/registrarse">crear cuenta</a>
    <a href="/close">Cerrar seccion</a>
  </div>
</header>
<main>
