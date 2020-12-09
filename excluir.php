<?php

include("conexao.php");

$id = $_POST['id'];

$del = "DELETE FROM `pedidos` WHERE `id` = $id";
$delete = "DELETE FROM `itens` WHERE `pedido` = $id";
  
if (mysqli_query($conn, $del)) {
    if (mysqli_query($conn, $delete)) {
    }
    echo $id;
} else {
    echo "erro";
}


?>