<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;
//obtener usuarios


$app->get('/read', function(Request $request, Response $response){
    $consulta = "SELECT * FROM usuario";

    try {
        $db = new db();
        $db = $db->conexionDB();
        $respuesta = $db->query($consulta);

        if($respuesta->rowCount() > 0){
            $usuario = $respuesta->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($usuario);
        }else{
            echo json_encode("No existe el usuario");
        }
        $respuesta = null;
        $db = null;

    } catch (PDOException $e) {
        echo json_encode('Ah ocurrido un error '.$e->getMessage());
    }
});
$app->post('/create', function(Request $request, Response $response){
    $body = $request->getBody();
    $data = json_decode($body);

    $nombre = $data->Nombre;
    $correo = $data->Correo;
    $usuario = $data->Nombre_usuario;

    $consulta = "INSERT INTO usuario values(:id,:nombre,:correo,:usuario)";

    try{
        $db = new db();
        $db = $db->conexionDB();
        $respuesta = $db->prepare($consulta);

        $respuesta->bindParam(':id', $id);
        $respuesta->bindParam(':nombre', $nombre);
        $respuesta->bindParam(':correo', $correo);
        $respuesta->bindParam(':usuario', $usuario);

        $respuesta->execute();

        echo json_encode('datos Agregados!!!');

        $respuesta = null;
        $db = null;

    } catch (PDOException $e){
        echo json_encode('error!! '.$e->getMessage());
    }
});

$app->put('/update/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $body = $request->getBody();
    $data = json_decode($body);

    $Nombre = $data->Nombre;
    $Correo = $data->Correo;
    $Usuario = $data->Nombre_usuario;

    $consulta = "UPDATE usuario set Nombre=:nombre, Correo=:correo, Nombre_usuario=:usuario WHERE idusuario=$id";

    try{
        $db = new db();
        $db = $db->conexionDB();
        $respuesta = $db->prepare($consulta);

        $respuesta->bindParam(':nombre', $Nombre);
        $respuesta->bindParam(':correo', $Correo);
        $respuesta->bindParam(':usuario', $Usuario);

        $respuesta->execute();

        echo json_encode('datos actualizados');

        $respuesta = null;
        $db = null;

    }catch (PDOException $e){
        echo json_encode('error!!!'. $e->getMessage());
    }
});

$app->delete('/delete/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $consulta = "DELETE FROM usuario WHERE idusuario=$id";

    try{
        $db = new db();
        $db = $db->conexionDB();
        $respuesta = $db->prepare($consulta);

        $respuesta->execute();

        echo json_encode('dato eliminado');

        $db = null;
        $respuesta = null;
    } catch (PDOException $e){
        echo json_encode('Error!!!'.$e->getMessage());
    }
});
