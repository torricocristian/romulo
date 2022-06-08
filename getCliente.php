<?php
$cliente = $_POST['cliente'];

// New Connection
$db = new mysqli("localhost", "root", "root", "arceri");
// Check for errors
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

if ($result = $db->query("SELECT * FROM cliente WHERE nombre LIKE '%".$cliente."%' OR dni LIKE '%".$cliente."%'")) {
    /* obtener el array de objetos */
    while ($fila = $result->fetch_assoc()) {
        $data[] = $fila;
    }
    echo json_encode($data);
    $result->close();
}else{
    echo 0;
}
