<?php

include("conexao.php");

$id = $_POST['id'];
$status = $_POST['status'];

$edit = "UPDATE `pedidos` SET status='$status' WHERE `id` = $id";
  
if (mysqli_query($conn, $edit)) {
    echo $id;
} else {
    echo "erro";
}


?>