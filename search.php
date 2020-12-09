<?php
include("conexao.php");

$idpedido = $_POST['id'];

echo '<div id="resultpesquisa">';
if(is_numeric($idpedido)){
    $get = mysqli_query($conn, "SELECT * FROM `pedidos` WHERE id = $idpedido");
    if(mysqli_num_rows($get) > 0){
        while($rows = mysqli_fetch_array($get)){
            $id = $rows["id"];
            $nome = $rows["cliente"];
            $status = $rows["status"];
            echo "<h3 id='title-search'>#". $id . " ". $nome."</h3>";
            

            $getitens = mysqli_query($conn, "SELECT * FROM `itens` WHERE pedido = $id ");
            if(mysqli_num_rows($getitens) > 0){
                while($itens = mysqli_fetch_array($getitens)){
                    $qto = $itens['qto'];
                    $produto = $itens['produto'];
                
                    echo "<div id='search-itens'>";
                    echo $qto;
                    echo $produto."<br>";
                    echo "</div>";
                }
            }

            if($status == "aguardando"){
                echo "Status: <b style='color: blue;'>Aguardando Aprovação do Restaurante!!!</b>";
            }elseif($status == "preparando"){
                echo "Status: <b style='color: green;'>O Restaurante aprovou seu pedido, seu lanche está sendo preparado!!!</b>";
            }elseif($status == "saiuentrega"){
                echo "Status: <b style='color: blue;'>Seu pedido saiu para Entrega!!!</b>";
            }elseif($status == "entregue"){
                echo "Status: <b style='color: green;'>Pedido Entregue com sucesso!!!</b>";
            }else{
                echo "Status <b style='color: red;'>Pedido cancelado!!!</b>";
            }
        }
    }else{
            echo "<p align='center'>Pedido não encontrado.</p>";
    }
}else{
    echo"<p align='center'>Os pedidos são apenas números.</p>";
}


echo '</div';
?>