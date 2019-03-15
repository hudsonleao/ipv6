<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adicionar</title>
    </head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <body>
        <div class="container">
        <div class="col-12"><br>
        <h1 style="text-align: center" >ADICIONAR IPv6</h1><br>
        <?php if (isset($_GET['ipduplicado']) && empty($_GET['ipduplicado'])) {
          echo '<div class="alert alert-danger" role="alert">
         IPV6 já cadastrado!
        </div> ';}
        if (isset($_GET['userduplo']) && empty($_GET['userduplo'])) {
          echo '<div class="alert alert-danger" role="alert">
         Usuário já cadastrado!
        </div> ';}?>
            <form method="post" action="banco/inserir.php">
                <div class="form-group">
                    <label for="formGroupExampleInput">Usuário</label>
                    <input type="text" required class="form-control" name="usuario" id="usuario" placeholder="Digite o usuário">
                </div><div class="form-group">
                    <label for="formGroupExampleInput">IPV6</label>
                    <input type="text" required class="form-control" name="prefixo" id="prefixo" placeholder="Digite o prefixo">
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
            </div></div>

    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>


