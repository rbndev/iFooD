<?php

include("conexao.php");

$id = $_POST['id'];

$del = "INSERT INTO `pedidos` (`id`, `cliente`, `data`, `valor`) VALUES (NULL, '$nome', '$data', '$total');";


?>