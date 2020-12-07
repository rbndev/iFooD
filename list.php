
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem Pedidos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    ?>
    <div id="ctn">
        <div id="cards" class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">
                # <?php echo $id; ?>
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

</body>
</html>

