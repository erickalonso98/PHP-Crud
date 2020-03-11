<?php 
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bdname = "contactos";

    $conn = new mysqli($servidor,$usuario,$password,$bdname);

    if($conn->connect_error){
        echo $error = $conn->connect_error;
    }
?>