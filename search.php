<?php
include("conexao.php");

$idpedido = $_POST['id'];

echo '<div id="resultpesquisa">';

$get = mysqli_query($conn, "SELECT * FROM `pedidos` WHERE id = $idpedido");
if(mysqli_num_rows($get) > 0){
while($rows = mysqli_fetch_array($get)){
    $id = $rows["id"];
    $nome = $rows["cliente"];
    echo "<h3 id='title-search'>#".$id . " ". $nome."</h3>";
    }


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
}else{
    echo "Pedido não entrado.";
}
echo '</div';
?>