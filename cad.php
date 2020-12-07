<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastre-se</h1><br>
    <form action="cad.php" method="post">
        <fieldset>
            <label>
                Nome:
                <br>
                <input type="text" name="nome" value="<?php if(isset($_POST["nome"])){ echo $_POST["nome"]; }?>"/>
            </label>
            <br>
            <label>
                Sobrenome:
                <br>
                <input type="text" name="sobrenome" value="<?php if(isset($_POST["sobrenome"])){ echo $_POST["sobrenome"]; }?>"/>
            </label>
            <br>
            <label>
                Email:
                <br>
                <input type="text" name="email" value="<?php if(isset($_POST["email"])){ echo $_POST["email"]; }?>"/>
            </label>
            <br>
            <button type="submit" value="Cadastrar">Cadastrar</button>
        </fieldset>
    </form>
    
</body>
</html>    
<?php

    $nome;
    $sobrenome;
    $email;

    if(isset($_POST['nome']) || !empty($_POST['nome'])){
        $nome = $_POST['nome'];

        if(!preg_match("/^[a-zA-Z-']*$/",$nome)){
            echo "nome invalido". "<br>";
        }
    }
    
    if(isset($_POST['email']) || !empty($_POST['email'])){
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "informe um email valido" . "<br>";
        }
    }

    if(isset($_POST['sobrenome']) || !empty($_POST['sobrenome'])){
        $sobrenome = $_POST['sobrenome'];
        if(!preg_match("/^[a-zA-Z-']*$/",$sobrenome)){
                echo "sobrenome invalido" . "<br>";
        }
    }
?>