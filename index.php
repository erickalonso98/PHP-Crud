<?php 

    try {
        require 'funciones/conexion.php';
        $sql = "SELECT * FROM contacto";
        $query = $conn->query($sql);
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
            <form action="crear.php" method="post">
                <div class="campo">
                    <label for="Nombre">Nombre
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                    </label>
                </div>

                <div class="campo">
                    <label for="Numero">Numero
                        <input type="text" name="numero" id="numero" placeholder="Numero">
                    </label>
                </div>
                <input type="submit" class="boton" value="Agregar">
            </form>
        </div>

            <div class="contenido existentes">
                <h2>Contactos Existentes</h2>
                <p>
                    Numeros de contactos:<?php $query->num_rows; ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Modificar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <?php

                        $consultarDatos = "SELECT * FROM contacto";
                        $ejecutarConsulta = mysqli_query($conn, $consultarDatos);
                        ?>
                        <tbody>
                            <?php 
                                while($mostrar = mysqli_fetch_array($ejecutarConsulta)){ ?>
                                   <tr>
                                       <td>
                                           <?php $mostrar['nombre']; ?>
                                       </td>
                                       <td><?php $mostrar['telefono'] ?></td>
                                       <td><a href="aditar.php?id=<?php echo $mostrar['id'] ?>">Actualizar</a></td>
                                       <td class="borrar"><a href="borrar.php?id=<?php echo $mostrar['id'] ?>">Eliminar</a></td>
                                   </tr>
                                
                                <?php   }?>
                        </tbody>
                    </table>
                </p>
            </div>
    </div>
    <?php $conn->close(); ?>
</body>
</html>