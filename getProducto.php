<?php
$producto = $_POST['producto'];

// New Connection
$db = new mysqli("localhost", "root", "root", "arceri");
// Check for errors
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

// 1st Query
// $result = $db->query("SELECT * FROM producto WHERE nombre LIKE '%$producto%'");

// var_dump($result->fetch_object());




if ($result = $db->query("SELECT * FROM producto WHERE nombre LIKE '%$producto%'")) {
    /* obtener el array de objetos */
    while ($fila = $result->fetch_assoc()) {
        $data[] = $fila;
    }
    echo json_encode($data);
    $result->close();
}else{
    echo 0;
}
