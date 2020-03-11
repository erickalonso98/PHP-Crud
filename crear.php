<?php 
        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
        }

        if(isset($_POST['numero'])){
            $numero = $_POST['numero'];
        }

    try {
        require 'funciones/conexion.php';
        $sql = "INSERT INTO `contacto`(`id`,`nombre`,`telefono`)VALUES(NULL,'{$nombre}','{$numero}'); ";
        $query= $conn->query($sql);
    } catch (Exception $e) {
       $error = $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda php</title>
    <link rel="stylesheet" href="css/style.css" media="screen">
</head>
<body>
    <div class="contenedor">
        <h1>Agenda</h1>
        <div class="contenido">
            <h2>Nuevo Contactos</h2>
              <?php 
                if($query){
                    echo "Contacto Creado Satisfactoriamente";
                }else{
                    echo "Error ".$conn->error;
                }
              ?> 
              <br>
              <a class="volver" href="index.php">Regresar</a>
        </div>
    </div>

    <?php $conn->close(); ?>
</body>
</html>