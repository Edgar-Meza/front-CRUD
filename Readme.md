# Manual Técnico

## Introducción

Aplicación web que realiza operaciones CRUD (Create, Read, Update y Delete), desarrollada con Framework Slim (PHP) para la creación de un API que realizara las operaciones CRUD para la parte del Back-end, HTLM, CSS (Bootstrap) y javaScript (uso de libreria axios para peticiones HTTP), para la parte del Front-end y para la parte de bases de datos se uso el gestor de bases de datos MySQL.

![Página](./assets/page.png "Página muestra")

La aplicacion web funciona mediante peticiones HTTP a un API que se encargara de realizar las operacion CRUD a una base de datos MySQL mediante el lenguaje PHP y con ayuda de JavaScript con la libreria axios de hacen las solicitudes get, post, put y delete desde la interface de usuario.


## Objetivo

El objetivo principal de esta aplicacion es la realización de las operaciones CRUD a una base de datos desde la web, con apoyo de algun framework de cualquier lenguaje de porgramación que en esta ocacion se decidio trabajar con PHP para la parte del Back-en  y JavaScript para el Fron-end.

![slim framework](./assets/slim.png "imagen de Slim Framework")
![Slim install](./assets/slim-install.png "instalacion de slim")

## Guia de uso

En este apartado se explicara de manera detallada el funcionamiento de la aplicación web.

**Pantalla de inicio**

Muestra una tabla con los datos ingresados en la base de datos
![Pantalla de incio](./assets/page.png "Pantalla de inicio")

**Agregar nuevos datos**

Haciendo clic sobre el boton verde de la parte superior de abrira un formaulario en el cual se deberan agregar los datos que deseamos ingresar a la base de datos

![boton agregar datos](./assets/btn-create.png "boton agregar datos")

Formulario 
![Formulario para agregar nuevos datos](./assets/form-new.png "Fromulario agregar")

**Actualizar datos**

Para actualizar algun dato basta con dar clic sobre el boton azul de la fila donde se encuentre el registro que se modificara, se abrira un formulario con los datos del registro, posteriormente ingresar los nuevos datos que queremos actualizar.

![Boton actualizar](./assets/btn-update.png "Boton para actualizar algun registro")

Formulario actualizar
![Formulario actualizar](./assets/form-update.png "Formulario actualizar")


**Eliminar registro**

Para eliminar un registro de la base de datos bastara con hacer clic sobre el boton rojo de la fila del registro que deseamos eliminar y confirmar si queremos eliminar el registro.
![Boton de eliminar](./assets/btn-delete.png "Boton eliminar")

Pantalla de confirmación
![Confirmación](./assets/confirmacion.png "Confirmación")

- - -
- - -

# Implementación

Para implementar este proyecto en cualquier entorno de desarrollo o produccion y que funcione correctamente sera necerario contar con los siguietes elementos: 

- PHP version 7.0 o superior
- Gestor de base de datos MySQL
- Servidor apache


Consfiguracion de la base de datos
Crear una base de dato sen MySQL y dentro crear una tabla llamada usuario con las columnas idusuario, nombre. correo y nombre usuario.

~~~
 CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Nombre_usuario` varchar(100) NOT NULL
)
~~~

Una vez creada la base de datos se debera configurar el archivo db.php cubicado en la ruta API/src/config/db.php cambiando los parametros de conexion por los que hemos generado en la nueva base de datos 

~~~
 <?php
    class db{
        private $host = "jhdjjtqo9w5bzq2t.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        private $user = "r5yt7vt1w4l3a33z";
        private $password = "gphmkg044hcp3gcc";
        private $database = "us80dn4domphm56j";

        public function conexionDB(){
            $connect = "mysql:dbname=$this->database;host=$this->host";
            $dbConexion = new PDO($connect, $this->user, $this->password);
            $dbConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConexion;
        }
    }

~~~

y por ultimo en el archivo datos.js ubicado en docs/js/datos.js bastara con colocar el nombre de dominio para comunicacion con el API, para poder realizar las peticiones HTTP.

![Get](./assets/get.png "Peticion get")

![post](./assets/post.png "Peticion post")

![Put](./assets/put.png "Peticion put")

![Delete](./assets/delete.png "Peticion delete")

y listo esa sera la configuracion necesaria para poner en marcha este pequeño proyecto.
