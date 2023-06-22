<?php
//$path = $_SERVER['REQUEST_URI'];
$fullUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($fullUrl);
$path = $parsedUrl['path']; // Ruta sin los parámetros
//$queryString = $parsedUrl['query'];

if($path === "/"){
   include "./pages/home.php";
   exit();
}

if($path === "/close"){
   include "./cerrar.php";
   exit();
}

if($path === "/proyectos"){
   include "./pages/proyectos.php";
   exit();
}
if($path === "/login"){
   include "./login.php";
   exit();
}

if($path === "/proyectos/css"){
   include "./pages/apps/productos.php";
   exit();
}
if($path === "/app/productos"){
   include "./pages/apps/productos.php";
   exit();
}
if($path === "/registrarse"){
   include "./pages/registrarse.php";
   exit();
}
$filename = basename($path);

// Verificar si el archivo existe
if (file_exists($filename)) {
    include $filename;
    exit();
} else {
    // Archivo no encontrado
    echo "404 - Archivo no encontrado";
}
?>
