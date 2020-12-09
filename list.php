
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem Pedidos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" 
    integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="css/list.css">
</head>
<body>

<div id="box">

    <?php
    include("conexao.php");
    $get = mysqli_query($conn, "SELECT * FROM `pedidos`");
    while($rows = mysqli_fetch_array($get)){
        $id = $rows["id"];
        $nome = $rows["cliente"];
        $status = $rows["status"];
    ?>
    <div id="ctn" data-id="<?php echo $id?>">
        <div id="cards" class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">
                # <?php 
                $idid = $rows["id"];
                echo $id;
                echo " / ".$status;
                echo "<i id='$idid' style='float:right; margin-left:10px;color:red;' class='far fa-trash-alt excluir'></i>";
                echo "<i id='$idid' style='float:right; margin-left:5px;color: orange;' class='fas fa-user-edit editar'></i>";
                ?>
            </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo  $nome?></h5>
                    <p class="card-text">   
                        <?php
                        $getitens = mysqli_query($conn, "SELECT * FROM `itens` WHERE pedido = $id ");
                        while($itens = mysqli_fetch_array($getitens)){
                            $qto = $itens['qto'];
                            $produto = $itens['produto'];
                        ?>
                        <?php 
                            echo $qto . ' ' . $produto . '<br>';
                        }// Fim Fetch Pedidos
                        ?>
                    </p>
                    <br>
                    <b>R$ <?php echo $rows["valor"] ?>,00</b>
                    
                </div>
            </div>
        </div>
        <?php
        }// FIM Fetch array
        ?>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="js/listagem.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
</body>
</html>

