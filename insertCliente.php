<?php
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];

// New Connection
$db = new mysqli("localhost", "root", "root", "arceri");
// Check for errors
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

if ($result = $db->query("INSERT INTO cliente (dni, nombre) VALUES ('".$dni."','".$nombre."')")) {
    echo 1;
}else{
    echo 0;
}
