<!DOCTYPE html>
<?php

$conexao = mysqli_connect('localhost', 'radius', 'r4d1us');
$banco = mysqli_select_db($conexao, 'radius');
mysqli_set_charset($conexao, 'utf8');

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = mysqli_query($conexao, "select * from radreply where id = '".$id."'");

?>
 
</div></div>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar</title>
    </head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <body>
        <div class="container">
            <br>
        <h1 style="text-align: center" >EDITAR IPv6</h1><br>
            <form method="post" action="banco/salvar_edicao.php">
            <?php
        while ($dados = mysqli_fetch_assoc($sql)) {
            ?>
            <input type="text" hidden readonly name="id" id="id" value="<?= $dados['id'] ?>" />
                <div class="form-group">
                    <label for="formGroupExampleInput">Usuário</label>
                    <input type="text" required class="form-control"  value="<?= $dados['username'] ?>" name="usuario" id="usuario" placeholder="Digite o usuário">
                </div><div class="form-group">
                    <label for="formGroupExampleInput">IPV6</label>
                    <input type="text" required class="form-control" value="<?= $dados['value'] ?>" name="prefixo" id="prefixo" placeholder="Digite o prefixo">
                </div>
                <?php
            }
            ?>
                <input type="submit" class="btn btn-success" onClick="return confirm('Deseja atualizar o registro?');" name="Submit" value="Salvar" id="button-form" />
            </form>

    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
