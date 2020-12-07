<?php

include("conexao.php");

if(isset($_POST['total']) AND isset($_POST['nome'])){

    $pizza = $_POST['pizza'];
    $coxinha = $_POST['coxinha'];
    $pastel = $_POST['pastel'];
    $refri = $_POST['refri'];
    $suco = $_POST['suco'];
    $agua = $_POST['agua'];
    
    $nome = $_POST['nome'];
    $data = date("Y-m-d");
    $total = $_POST['total'];

    if($_POST['total'] >= 1 AND trim($_POST['nome']) != ""){
        $insert = "INSERT INTO `pedidos` (`id`, `cliente`, `data`, `valor`) VALUES (NULL, '$nome', '$data', '$total');";
        if(mysqli_query($conn,$insert)){

            $pedidoinfo = "SELECT * FROM `pedidos` WHERE cliente = '$nome' AND data='$data' AND valor='$total' ORDER BY id DESC limit 1";
            $pedidoinfo = mysqli_fetch_assoc(mysqli_query($conn, $pedidoinfo));
            if($pizza >= 1){
                $infoid = $pedidoinfo['id'];
                $insert = "INSERT INTO `itens` (`id`, `pedido`, `produto`, `qto`) VALUES (NULL, '$infoid', 'pizza', '$pizza');";
                $insert = mysqli_query($conn, $insert);
            }
            if($coxinha >= 1){
                $infoid = $pedidoinfo['id'];
                $insert = "INSERT INTO `itens` (`id`, `pedido`, `produto`, `qto`) VALUES (NULL, '$infoid', 'coxinha', '$coxinha');";
                $insert = mysqli_query($conn, $insert);
            }
            if($pastel >= 1){
                $infoid = $pedidoinfo['id'];
                $insert = "INSERT INTO `itens` (`id`, `pedido`, `produto`, `qto`) VALUES (NULL, '$infoid', 'pastel', '$pastel');";
                $insert = mysqli_query($conn, $insert);
            }
            if($refri >= 1){
                $infoid = $pedidoinfo['id'];
                $insert = "INSERT INTO `itens` (`id`, `pedido`, `produto`, `qto`) VALUES (NULL, '$infoid', 'refri', '$refri');";
                $insert = mysqli_query($conn, $insert);
            }
            if($suco >= 1){
                $infoid = $pedidoinfo['id'];
                $insert = "INSERT INTO `itens` (`id`, `pedido`, `produto`, `qto`) VALUES (NULL, '$infoid', 'suco', '$suco');";
                $insert = mysqli_query($conn, $insert);
            }
            if($agua >= 1){
                $infoid = $pedidoinfo['id'];
                $insert = "INSERT INTO `itens` (`id`, `pedido`, `produto`, `qto`) VALUES (NULL, '$infoid', 'agua', '$agua');";
                $insert = mysqli_query($conn, $insert);
            }
        }
    }
}

?>