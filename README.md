# restPhp

Este es un servidor web emulando las rutas, ademas se conecta con una base de datos; pero para que funcione bien tenemos que crear una base de datos y configurar el apache.

1. desacargar codigo
2. crear una carpeta llamada data para la base de datos
3. ahora tienes el archivo docker-compose.yml, carpeta app y data
4. correr `docker-compose up -d` 
5. ejecuta `docker ps` para ver los ids de cada contenedor
6. primero habilitaremos para que se pueda conectar con la base de datos:
  1. ejecuta `docker exec -it idContenedorPhpApache /bin/bash`
  2. ejecuta `cd /`
  3. ejecuta `apt-get update`
  4. ejecuta `apt-get upgrade`
  5. instalar un editor en este caso vim ejecuta `apt-get install vim`
  6. ejecuta `docker-php-ext-install mysqli`
  7. en la linea Installing shared extensions, copiar `/usr/local/lib/php..../` hasta el ultimo
  8. ir a `cd /usr/local/etc/php`
  9. ahi hay tres archivos edita los que empizan con `php`
  10. dentro del archivo buscar con vim en modo normal `/Dyn` enter
  11. descomentar en donde esta `extension=/path/to.../mysql.os`
  12. reemplazar quedara `extensions=/lo copiado /mysqli.os `
  13. en ambos archivos
7. ahora habilitaremos para que reconozca rutas personalizadas:
  1. ir a la raiz `cd /`
  2. creamos un enlace simbolico `ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load`
  3. restar servicio `service apache2 restart`
  4. el contenedor se caera
  5. ejecutar `docker start idContendorphp`
  6. en la carpeta app crear una carpeta img y dar permisos en linux `chmod 777`
8. ahora crearemos una base de datos llamado web:
  1. una tabla de proyectos con campos: nombre, imagen, descripcion.
  2. una tabla de users con campos: nombre, contrasenia.
  3. ahora tendremos que entrar al contenedor de mysql y ejutar los comandos para crear las tablas
