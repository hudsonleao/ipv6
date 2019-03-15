<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$conexao = mysqli_connect('localhost', 'radius', 'r4d1us');
$banco = mysqli_select_db($conexao, 'radius');
mysqli_set_charset($conexao, 'utf8');

$sql = mysqli_query($conexao, "select * from radreply where attribute = 'Mikrotik-Delegated-IPv6-Pool'") or die("Erro");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IPV6</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script type="text/javascript">

window.onload=function(){

var filtro = document.getElementById('filtro-nome');
var tabela = document.getElementById('lista');
filtro.onkeyup = function() {
var nomeFiltro = filtro.value;
for (var i = 1; i < tabela.rows.length; i++) {
var conteudoCelula = tabela.rows[i].cells[1].innerText;
var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
tabela.rows[i].style.display = corresponde ? '' : 'none';
}
};

}

</script>
    </head>
    <body>
        <div class="container"><br>
        <div class="col-12">
        <h1 style="text-align: center" >USUÁRIOS COM IPv6</h1><br>
        <?php if (isset($_GET['editsalvo']) && empty($_GET['editsalvo'])) {
          echo '<div class="alert alert-success" role="alert">
          Edição efetuada com sucesso!
        </div> ';
      }  
      if (isset($_GET['salvoadd']) && empty($_GET['salvoadd'])) {
        echo '<div class="alert alert-success" role="alert">
        IPV6 adicionado para o  usuário!
      </div> ';
    }  
      if (isset($_GET['erro']) && empty($_GET['erro'])) {
      echo '<div class="alert alert-danger" role="alert">
      Ocorreu um erro!
    </div>';
  }
      ?>
        <div class="input-group">
                                <input class="form-control" id="filtro-nome" placeholder="Pesquisar pelo login">
                            </div><br>
            <a href="adicionar.php" class="btn btn-success"><span class="fa fa-user-plus"></span> Adicionar</a>
            <table class="table" id="lista">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">IPV6</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <?php
        while ($dados = mysqli_fetch_assoc($sql)) {
            ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $dados['id'] ?></th>
                    <td><?= $dados['username'] ?></td>
                    <td><?= $dados['value'] ?></td>
                    <td><a href="banco/excluir.php?id=<?= $dados['id'] ?>"class="btn btn-danger" onclick="return confirm('Tem certeza que deseja remover o IPv6 deste cliente?')"><span class="fa fa-trash-alt"></span> Excluir</button></a> <a href="editar.php?id=<?= $dados['id'] ?>" class="btn btn-info" style="color: white"><span class="fa fa-edit"></span> Editar</a></td>
                </tr>
                </tbody>
                </thead>
        </div>
        </div>

                <?php
            }
                        ?>
            </body>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</html>
